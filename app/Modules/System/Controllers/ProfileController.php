<?php

namespace System\Controllers;

use Framework\HttpException;
use Framework\Request;
use Framework\Session;
use Framework\Utils;

class ProfileController extends \Framework\BaseController
{
    const ACTIVITIES_LIMIT = 10;

    public function __construct()
    {
        $this->_userModel = new \Framework\Models\User();
    }

    public function defaultAction()
    {
        $userId = Request::get('userId', false);

        if (!$userId) {
            $user   = Session::get('user');
            $userId = $user->getId();
        }

        $user = $this->_userModel->find($userId);

        if (!$user) {
            throw new HttpException('User not found', 404);
        }

        $user['profile_photo'] = Utils::getProfilePhotoUrl($user['profile_photo'], $user['email'], 300);
        $activity                   = new \Framework\Models\Log();
        $user['activities']         = $activity->findByUser($user['user_id'], self::ACTIVITIES_LIMIT);
        $user['countAllActivities'] = $activity->countBy(array('user_id' => $user['user_id']));

        $user['modules'] = array();
        foreach ($user['privileges'] as $privilege) {
            if (!in_array($privilege['module'], $user['modules'])) {
                array_push($user['modules'], $privilege['module']);
            }
        }

        $user['environments']        = json_decode($user['allowed_environments'], true);

        $rolesModel = new \Framework\Models\Role();
        $fetch      = $rolesModel->fetchAll(array());
        $roles      = array();
        foreach ($fetch as $role) {
            $roles[$role['role_id']] = $role['name'];
        }

        $this->_render(
             'Profile.twig', array(
                               'user'  => $user,
                               'roles' => $roles
                           )
        );
    }

    protected function userAllowed()
    {
        return true;
    }
}
