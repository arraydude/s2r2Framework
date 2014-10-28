<?php

namespace Framework\Models;

class RolePrivilege extends DatabaseModel
{
    protected $_table = 'roles_privileges';
    protected $_primary = null;
    protected $_cols = array(
        'role_id',
        'module',
        'controller',
        'action',
    );

    public function findByRole($roleId)
    {
        return $this->fetchAll(array('role_id' => $roleId));
    }

    public function deleteByRole($roleId)
    {
        return $this->deleteBy(array('role_id' => $roleId));
    }
}
