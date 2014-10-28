<?php

namespace Framework\Models;

class UserPrivilege extends DatabaseModel
{
    protected $_table = 'users_privileges';
    protected $_primary = null;
    protected $_cols = array(
        'user_id',
        'module',
        'controller',
        'action',
    );

    public function findByUser($userId)
    {
        return $this->fetchAll(array('user_id' => $userId));
    }

    public function deleteByUser($userId)
    {
        return $this->deleteBy(array('user_id' => $userId));
    }
}
