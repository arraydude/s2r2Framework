<?php

namespace Framework\Models;

use Framework\Library\ACL;
use Framework\Session;

class User extends DatabaseModel
{
    protected $_table = 'users';
    protected $_primary = 'user_id';
    protected $_cols = array(
        'user_id',
        'username',
        'password',
        'name',
        'language_id',
        'role_id',
        'email',
        'referer_email',
        'enabled',
        'created_date',
        'updated_date',
        'last_login',
        'profile_photo',
        'gravatar',
        'markets',
        'jira_username',
        'allowed_environments',
    );
    
    public function getByEmail($mail)
    {
        $filters  = array(
            'email' => $mail,
            'enabled'  => true,
        );
        $qBuilder = $this->_getMainQuery();

        foreach ($filters as $field => $value) {
            $qBuilder->andWhere("{$field} = :{$field}");
        }
        $stmt     = $this->_conn()->prepare($qBuilder->getSQL());

        foreach ($filters as $field => $value) {
            $stmt->bindValue($field, $value);
        }
        $stmt->execute();
        $userData = $stmt->fetch();

        return $this->_loadExtraData($userData);
    }

    public function getByUsernameAndPassword($username, $password)
    {
        $filters  = array(
            'username' => $username,
            'password' => \sha1($password),
            'enabled'  => true,
        );
        $qBuilder = $this->_getMainQuery();

        foreach ($filters as $field => $value) {
            $qBuilder->andWhere("{$field} = :{$field}");
        }
        $stmt     = $this->_conn()->prepare($qBuilder->getSQL());

        foreach ($filters as $field => $value) {
            $stmt->bindValue($field, $value);
        }
        $stmt->execute();
        $userData = $stmt->fetch();

        return $this->_loadExtraData($userData);
    }

    private function _getMainQuery()
    {
        $qBuilder = $this->_conn()->createQueryBuilder();

        $qBuilder->select('distinct u.*, r.name as role_name, l.name as language_name, l.iso as language_iso')
                 ->from($this->_table, 'u')
                 ->leftJoin('u', 'languages', 'l', 'l.language_id = u.language_id')
                 ->leftJoin('u', 'roles', 'r', 'r.role_id = u.role_id');

        return $qBuilder;
    }

    private function _loadExtraData($userData)
    {
        if ($userData) {
            $userData['privileges'] = $this->_getPrivileges($userData);
            $userData['markets']    = $this->_getMarkets($userData);
            $userData['language']   = $this->_getLanguage($userData);
            $userData['role']       = $this->_getRole($userData);
        }

        return $userData;
    }

    public function find($key, $loadExtraData = true)
    {
        $qBuilder = $this->_getMainQuery();
        $qBuilder->where("u.user_id = :user_id");
        $stmt     = $this->_conn()->prepare($qBuilder->getSQL());

        $stmt->bindValue('user_id', $key);
        $stmt->execute();
        $userData = $stmt->fetch();

        if ($loadExtraData) {
            $userData = $this->_loadExtraData($userData);
        }
        
        return $userData;
    }
    
    public function updateLastLogin($userId)
    {
        $this->save(array('last_login' => null), $userId);
    }

    public function updateProfilePhoto($photoUrl, $userId)
    {
        $this->save(array('profile_photo' => $photoUrl), $userId);
    }

    private function _getRole($userData)
    {
        return array(
            'role_id' => $userData['role_id'],
            'name'    => $userData['role_name'],
        );
    }

    private function _getMarkets($userData)
    {
        $markets = array();

        if (!is_null($userData['markets'])) {
            $marketsIds = json_decode($userData['markets'], true);
            foreach ($marketsIds as $marketId) {
                $markets[$marketId] = Market::findById($marketId);
            }
        }

        return $markets;
    }

    private function _getLanguage($userData)
    {
        return array(
            'language_id' => $userData['language_id'],
            'name'        => $userData['language_name'],
            'iso'         => $userData['language_iso'],
        );
    }

    private function _getPrivileges($userData)
    {
        if (!$userData) return array();

        $roleAction     = new RolePrivilege();
        $rolePrivileges = $roleAction->findByRole($userData['role_id']);

        $userAction     = new UserPrivilege();
        $userPrivileges = $userAction->findByUser($userData['user_id']);

        return array_merge($rolePrivileges, $userPrivileges);
    }

    public function findAll($filters, $orderBy = null, $limit = null, $offset = null)
    {
        $users = array();
        $qBuilder    = $this->_getMainQuery();
        
        $userRoles = implode(',', Session::get('user')->getMyRoles());
        $qBuilder->add('where', $qBuilder->expr()->andx("u.role_id IN ({$userRoles})"));

        if (is_array($orderBy)) {
            foreach ($orderBy as $column => $order) {
                $qBuilder->orderBy($column, $order);
            }
        }

        if (!is_null($limit)) {
            $qBuilder->setMaxResults($limit);
        }

        if (!is_null($offset)) {
            $qBuilder->setFirstResult($offset);
        }
        
        $orX = $qBuilder->expr()->orX();
        foreach ($filters as $field => $value) {
            $orX->add($qBuilder->expr()->like($field, ":like"));
            $qBuilder->setParameter('like', $value);
        }
        if ($orX->count()) {
            $qBuilder->andWhere($orX);
        }

        $result = $qBuilder->execute()->fetchAll();

        foreach ($result as $userData) {
            if (ACL::validateMarketPrivileges($userData['user_id'], $this->_getMarkets($userData), false)) {
                $userData['role'] = $this->_getRole($userData);
                $users[]          = $userData;
            }
        }

        return $users;
    }

    public function save($params, $key = null)
    {
        if (is_null($key)) {
            $params['created_date'] = null;
        }

        return parent::save($params, $key);
    }

    public function findUsersLike($filter, $orderBy = null, $limit = null, $offset = null)
    {
        return $this->findAll(self::getUserLikeFilter($filter), $orderBy, $limit, $offset);
    }

    public static function getUserLikeFilter($filter)
    {
        $filter = trim($filter);
        $like = array();
        if ($filter) {
            $keyword = '%'.$filter.'%';
            $like = array(
                'u.username' => $keyword,
                'u.email' => $keyword,
                'u.name' => $keyword
            );
        }

        return $like;
    }
}
