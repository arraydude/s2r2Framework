<?php

namespace Framework\Business;

use Framework\Library\ACL;
use Framework\Models\Role;
use Framework\Utils;

class User
{
    const MARKETS_COUNT = 6;
    const SUPER_ADMIN   = 1;
    
    private $_id;
    private $_username;
    private $_environments;
    private $_enabled;
    private $_language;
    private $_role;
    private $_markets;
    private $_gravatar;
    private $_profile_photo;
    private $_privileges = array();
    private $_email;
    private $_refererMail;
    private $_name;
    private $_createdDate;

    public function __construct($userData)
    {
        $this->_id              = $userData['user_id'];
        $this->_username        = $userData['username'];
        $this->_environments    = json_decode($userData['allowed_environments'], true);
        $this->_enabled         = $userData['enabled'];
        $this->_email           = $userData['email'];
        $this->_refererMail     = $userData['referer_email'];
        $this->_name            = $userData['name'];
        $this->_gravatar        = $userData['gravatar'];
        $this->_profile_photo   = $userData['profile_photo'];
        $this->_createdDate     = $userData['created_date'];
        $this->_language        = (object)$userData['language'];
        $this->_role            = (object)$userData['role'];
        $this->_markets         = $userData['markets'];
        if (isset($userData['privileges'])) {
            $this->_loadPrivileges($userData['privileges']);
        }
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getUsername()
    {
        return $this->_username;
    }

    public function getPrivileges()
    {
        return $this->_privileges;
    }

    public function getCreatedDate()
    {
        return $this->_createdDate;
    }
    
    public function getEnvironments()
    {
        return $this->_environments;
    }

    public function getGravatarAccount()
    {
        return $this->_gravatar;
    }

    public function getGravatarUrl()
    {
        return "";
    }

    public function getProfilePhoto($size = 35)
    {
        if (null != $this->_profile_photo) {
            $profilePhoto = $this->_profile_photo.'?sz='.$size;
        } else {
            $profilePhoto = Utils::getGravatarUrl($this->_email).'?s='.$size;
        }

        return $profilePhoto;
    }

    public function getModules()
    {
        if ($this->isAdmin()) {
            $modules = ACL::getModules();
            array_walk(
                $modules, function (&$module) {
                    $module = strtolower($module);
                }
            );
        } else {
            $modules = array();
            foreach ($this->_privileges as $privilege) {
                $exploded = explode('_', $privilege);
                $module   = $exploded[0];

                array_push($modules, $module);
            }

            $modules = array_unique($modules);
        }

        return $modules;
    }

    public function isEnabled()
    {
        return $this->_enabled;
    }

    public function getLanguageId()
    {
        return $this->_language->language_id;
    }

    public function getLanguageIso()
    {
        return $this->_language->iso;
    }

    public function getRoleName()
    {
        return $this->_role->name;
    }

    public function getRoleId()
    {
        return $this->_role->role_id;
    }

    public function getRolesTree()
    {
        $roles = new Role();

        return $roles->getRolesTree($this->getRoleId());
    }
    
    public function getMarkets()
    {
        if ($this->isAdmin()) {
            return \Framework\Models\Market::getAll();
        } else {
            return $this->_markets;
        }
    }

    private function _loadPrivileges($privileges)
    {
        foreach ($privileges as $privilege) {
            array_shift($privilege);

            $this->_privileges[] = implode('_', $privilege);
        }
    }

    public function getMyRoles()
    {
        $ids = array();

        array_walk_recursive(
            $this->getRolesTree(), function (&$value, $key) use (&$ids) {
                if ($key == 'role_id') {
                    array_push($ids, $value);
                }
            }
        );

        return $ids;
    }

    public function isAdmin()
    {
        return $this->_id == self::SUPER_ADMIN;
    }

    public function getRefererEmail()
    {
        return $this->_refererMail;
    }
    
    public function hasAllMarkets()
    {
        return count($this->getMarkets()) == self::MARKETS_COUNT;
    }
}
