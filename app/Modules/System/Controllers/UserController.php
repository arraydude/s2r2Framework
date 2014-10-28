<?php

namespace System\Controllers;

use Framework\HttpException;
use Framework\Library\ACL;
use Framework\Request;
use Framework\Session;

class UserController extends \Framework\BaseController
{
    const ACTIVITIES_LIMIT = 10;
    const USERS_LIMIT      = 10;

    public function __construct()
    {
        $this->_userModel = new \Framework\Models\User();
        parent::__construct();
    }

    public function listAction()
    {
        $search = Request::get('search', '');
        $page   = Request::get('page', 1);
        $offset = ($page - 1) * self::USERS_LIMIT;

        $users = $this->_userModel->findUsersLike($search, array('created_date' => 'desc'), self::USERS_LIMIT, $offset);

        if (Request::get('jsonResponse', false)) {
            $this->_jsonResponse(
                array(
                    'elements' => $users,
                    'addMore'  => true //@toDo: Add More functionality
                )
            );
        } else {
            $this->_render('List.twig', array('users'  => $users, 'search' => $search));
        }
    }

    public function toggleEnableAction($params)
    {
        $userId  = $params['userId'];
        $enabled = $params['enabled'];

        ACL::validateMarketPrivileges($userId);
        if ($userId == Session::get('user')->getId()) {
            throw new HttpException('User logged in cannot be disabled', 403);
        }

        $this->_userModel->save(array('enabled' => $enabled), $userId);
    }

    public function getActivitiesAction()
    {
        $request = Request::getAll();

        $offset = ($request['page'] - 1) * self::ACTIVITIES_LIMIT;

        $model      = new \Framework\Models\Log;
        $activities = $model->findByUser($request['user_id'], $offset . ', ' . self::ACTIVITIES_LIMIT, '');

        $this->_jsonResponse(
            array(
                'elements' => $activities,
                'addMore'  => true //@toDo: Add more functionality
            )
        );
    }
}
