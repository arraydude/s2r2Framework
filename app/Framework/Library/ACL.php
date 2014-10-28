<?php

namespace Framework\Library;

use Framework\Business;
use Framework\HttpException;
use Framework\Models;
use Framework\Session;

class ACL
{
    const SUPER_ADMIN = 1;
    const ENVIRONMENT_DEV = 'dev';
    const ENVIRONMENT_TESTING = 'testing';
    const ENVIRONMENT_STAGING = 'staging';
    const ENVIRONMENT_PROD = 'prod';

    final public static function allowed($privilege)
    {
        $user = Session::get('user');
        if ($user->isAdmin()) {
            return true;
        }

        return in_array($privilege, $user->getPrivileges());
    }

    final public static function validateUserByEmail($mail)
    {
        $userModel = new Models\User();
        return $userModel->getByEmail($mail);
    }
    
    final public static function validateUserByUsernameAndPassword($username, $password)
    {
        $userModel = new Models\User();
        return $userModel->getByUsernameAndPassword($username, $password);
    }
    
    final public static function saveUserData($userData)
    {
        $userId = $userData['user_id'];
        
        $userModel = new Models\User();
        $userModel->updateLastLogin($userId);

        if (null != $userData['profile_photo']) {
            $userModel->updateProfilePhoto($userData['profile_photo'], $userId);
        }
       
        Session::set('user', new Business\User($userData));
    }

    final public static function isLogged()
    {
        return Session::get('user');
    }

    final public static function refreshUserSession()
    {
        $userModel = new Models\User();
        $userData  = $userModel->find(Session::get('user')->getId());

        Session::delete('user');
        Session::set('user', new Business\User($userData));
    }

    final public static function validateMarketPrivileges($userId, $userMarkets = null, $throwException = true)
    {
        if (empty($userId)) return;

        $disallowed = false;

        if (is_null($userMarkets)) {
            $userModel   = new \Framework\Models\User();
            $userData    = $userModel->find($userId);
            $userMarkets = $userData['markets'];
        }

        $myMarkets    = Session::get('user')->getMarkets();
        $intersection = array_intersect($userMarkets, $myMarkets);

        if (empty($intersection)) {
            $disallowed = true;
        }
        if (count($userMarkets) > count($myMarkets)) {
            $disallowed = true;
        }
        if ($userId == self::SUPER_ADMIN && !Session::get('user')->isAdmin()) {
            $disallowed = true;
        }
        if ($disallowed) {
            if ($throwException) {
                throw new HttpException('Insufficient privileges to view/edit this user', 403);
            } else {
                return false;
            }
        }

        return true;
    }

    final public static function validateRolesPrivileges($roleId)
    {
        if (empty($roleId)) return;

        $myRoles = Session::get('user')->getMyRoles();

        if (!in_array($roleId, $myRoles)) {
            throw new HttpException('Insufficient privileges to view/edit this role', 403);
        }
    }
    
    final public static function validateEnvironmentLevel($requestedEnv)
    {
        $user = Session::get('user');
        $userEnvs = $user->getEnvironments();

        if (! in_array($requestedEnv, $userEnvs) && !$user->isAdmin()) {
            throw new HttpException("Insufficient privileges to access '{$requestedEnv}' environment", 403);
        }
    }
    
    final public static function getEnvironments()
    {
        return array(
            ACL::ENVIRONMENT_DEV,
            ACL::ENVIRONMENT_TESTING,
            ACL::ENVIRONMENT_STAGING,
            ACL::ENVIRONMENT_PROD,
        );
    }
    
    final public static function getModules()
    {
        $modules = array('System');
        
        $dir   = __DIR__ . '/../../Modules/';
        $content = scandir($dir);
        array_shift($content);
        array_shift($content);
        
        foreach ($content as $module) {
            if ($module == 'System') {
                continue;
            }
            array_push($modules, $module);
        }
        
        return $modules;
    }
    
}
