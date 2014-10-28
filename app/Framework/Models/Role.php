<?php

namespace Framework\Models;

class Role extends DatabaseModel
{
    protected $_table = 'roles';
    protected $_primary = 'role_id';
    protected $_cols = array(
        'role_id',
        'name',
        'parent_id',
    );

    public function deleteBy($roleId)
    {
        parent::deleteBy(
              array(
                  'role_id' => $roleId
              )
        );
        $rolePrivilege = new RolePrivilege();
        $rolePrivilege->deleteByRole($roleId);
    }

    public function getRolesTree($roleId)
    {
        $tree = $this->findAll();

        $index = 0;
        while ($tree[$index]['role_id'] != $roleId) {
            $index++;
        }
        $myRole = $tree[$index];

        $myRole['children'] = $this->_getChildren($tree, $roleId);

        return array($myRole);
    }

    private function _getChildren($tree, $roleId)
    {
        $return = array();

        foreach ($tree as $index => $role) {
            if ($role['parent_id'] == $roleId) {
                unset($tree[$index]);
                $return[] = array_merge(
                    $role,
                    array(
                        'children' => $this->_getChildren($tree, $role['role_id'])
                    )
                );
            }
        }

        return empty($return) ? null : $return;
    }
}
