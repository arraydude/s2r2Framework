<?php

namespace System\Controllers;

use Framework\Library\ACL;
use Framework\Models\Privilege;
use Framework\Models\Role;
use Framework\Models\RolePrivilege;
use Framework\Models\User;
use Framework\Request;
use Framework\Session;
use Framework\Utils;

class RolesController extends \Framework\BaseController
{
    public function listAction()
    {
        $roles = Session::get('user')->getRolesTree();

        $this->_render(
             'List.twig', array(
                            'roles' => $roles
                        )
        );
    }

    public function newAction()
    {
        $privilegeModel = new \Framework\Models\Privilege();

        $this->_render(
             'New.twig', array(
                           'privileges' => $privilegeModel->getVisibleByUser(Session::get('user'))
                       )
        );
    }

    public function editAction()
    {
        $roleId = Request::get('roleId', false);
        ACL::validateRolesPrivileges($roleId);

        $roleModel          = new Role();
        $privilegeModel     = new Privilege();
        $rolePrivilegeModel = new RolePrivilege();

        $role              = $roleModel->find($roleId);
        $privilegesChecked = $rolePrivilegeModel->findByRole($roleId);

        $this->_render(
             'New.twig', array(
                           'privileges' => $privilegeModel->getVisibleByUser(Session::get('user')),
                           'roleId'     => $roleId,
                           'name'       => $role['name'],
                           'checked'    => $privilegesChecked
                       )
        );
    }

    public function getPrivilegesByRoleAction()
    {
        $roleId = Request::get('roleId', false);
        if ($roleId) {
            $rolePrivilegesModel = new RolePrivilege();
            $this->_jsonResponse($rolePrivilegesModel->findByRole($roleId));

            return true;
        }

        $this->_jsonResponse(false);

        return false;
    }

    public function saveAction()
    {
        $request   = Request::getAll();
        $roleModel = new Role();

        $roleId = Request::get('roleId', false);
        ACL::validateRolesPrivileges($roleId);

        try {
            $params = array('name' => $request['name']);
            if (!$roleId) {
                $params['parent_id'] = Session::get('user')->getRoleId();
            }
            $roleId = $roleModel->save($params, $roleId);
        } catch (\Exception $exc) {
            $roleId = false;
            echo $exc->getTraceAsString();
        }


        if ($roleId) {
            $rolePrivilegeModel = new RolePrivilege();
            $rolePrivilegeModel->deleteByRole($roleId);

            if ($privileges = Request::get('privileges', array())) {
                foreach ($privileges as $privilege) {
                    $components = explode('_', $privilege);
                    $rolePrivilegeModel->save(
                                       array(
                                           'role_id'    => $roleId,
                                           'module'     => $components[0],
                                           'controller' => $components[1],
                                           'action'     => $components[2]
                                       )
                    );
                }
            }
        }

        Utils::redirect('/system/roles/list');
    }

    public function deleteAction()
    {
        $success = true;
        $error = '';
            
        $roleId = Request::get('roleId', false);
        
        $userModel = new User;
        $users = $userModel->fetchAll(array('role_id' => $roleId));

        if ($users) {
            $success = false;
            $error = 'Some users are still associated to this role';
        } else {
            $roleModel = new Role;
            $roleModel->deleteBy($roleId);
        }

        $this->_jsonResponse(array(
            'success' => $success,
            'error' => $error,
        ));
    }
}
