<?php

namespace System\Controllers;

use Framework\Config;
use Framework\Library\ACL;
use Framework\Session;
use Framework\Utils;
use Framework\Request;

class RegisterController extends \Framework\BaseController
{
    public function defaultAction($userId = null)
    {
        $i18nConfig    = Config::get('i18n');
        $languageModel = new \Framework\Models\Language();
        $languages     = $languageModel->getMultipleByIso(array_keys($i18nConfig['gettext']['languageCode']));

        $markets = Session::get('user')->getMarkets();
        $roles   = Session::get('user')->getRolesTree();

        $actionModel = new \Framework\Models\Privilege();
        $actions     = $actionModel->getVisibleByUser(Session::get('user'));

        $userData = array();
        if ($userId) {
            $userModel = new \Framework\Models\User();
            $userData  = $userModel->find($userId);
        }

        $this->_render(
             'RegisterWizard.twig', array(
                                      'userData'     => $userData,
                                      'actions'      => $actions,
                                      'languages'    => $languages,
                                      'markets'      => $markets,
                                      'roles'        => $roles,
                                      'environments' => ACL::getEnvironments()
                                  )
        );
    }

    public function registerAction()
    {
        ACL::validateMarketPrivileges(Request::get('userId', null));
        $request = Request::getAll();

        $userModel = new \Framework\Models\User();

        $params = array(
            'username'          => $request['username'],
            'language_id'       => $request['language_id'],
            'role_id'           => $request['role_id'],
            'email'             => $request['email'],
            'referer_email'     => $request['referer_email'],
            'name'              => $request['name'],
            'jira_username'     => Utils::valid($request['jira_username'], null),
        );
        if (!empty($request['password'])) {
            $params['password'] = \sha1($request['password']);
        }
        if (isset($request['markets'])) {
            $params['markets'] = json_encode($request['markets'], JSON_NUMERIC_CHECK);
        }
        if (isset($request['allowed_environments'])) {
            $params['allowed_environments'] = json_encode($request['allowed_environments']);
        }

        try {
            $userId = $userModel->save($params, Request::get('userId', null));

            $this->_savePrivileges($request['privileges'], $userId);
        } catch (\Exception $exc) {
            echo $exc->getMessage();

            return false;
        }

        Utils::redirect('/system/user/list');
    }

    private function _savePrivileges($privileges, $userId)
    {
        $userPrivilegeModel = new \Framework\Models\UserPrivilege();
        $userPrivilegeModel->deleteByUser($userId);
        
        if ($privileges) {
            foreach ($privileges as $privilege) {
                $components = explode('_', $privilege);
                $userPrivilegeModel->save(
                                   array(
                                       'user_id'    => $userId,
                                       'module'     => $components[0],
                                       'controller' => $components[1],
                                       'action'     => $components[2],
                                   )
                );
            }
        }
    }

    public function editAction()
    {
        $userId = Request::get('userId', null);
        ACL::validateMarketPrivileges($userId);
        $this->defaultAction($userId);
    }

    public function getPrivilegesFromRoleAction()
    {
        $roleId = Request::get('roleId', null);

        $roleActions = new \Framework\Models\RolePrivilege();
        $actions     = $roleActions->findByRole($roleId);
        $privileges  = array();
        foreach ($actions as $action) {
            array_shift($action);
            $privileges[] = implode('_', $action);
        }

        echo json_encode($privileges);
    }
}
