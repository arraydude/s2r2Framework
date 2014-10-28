<?php

namespace Framework\Models;

use Framework\Library\ACL;

class Privilege
{
    public function findAll()
    {
        $actions = array();
        foreach (ACL::getModules() as $module) {
            $dir   = __DIR__ . '/../../Modules/' . $module . '/Controllers';
            $files = scandir($dir);
            array_shift($files);
            array_shift($files);
            foreach ($files as $file) {

                $source = file_get_contents($dir . '/' . $file);
                if (strpos($file, 'Controller.php') === false || $this->_controllerIsAlwaysAllowed($source) || $this->_controllerIsAjax($source)) {
                    continue;
                }

                $controller                    = str_replace('Controller.php', '', $file);
                $controllerActions             = $this->_getActionsFromController(token_get_all($source));
                $actions[$module][$controller] = $controllerActions;
            }
        }

        return $actions;
    }

    private function _inflate($privileges)
    {
        $tree = array();

        foreach ($privileges as $privilege) {
            list($module, $controller, $action) = explode('_', $privilege);
            $tree[ucfirst($module)][ucfirst($controller)][] = $action;
        }

        return $tree;
    }

    public function getVisibleByUser($user)
    {
        if ($user->isAdmin()) {
            return $this->findAll();
        }

        return $this->_inflate($user->getPrivileges());
    }

    private function _getActionsFromController($code)
    {
        $actions = array();
        foreach ($code as $token) {
            if ($token[0] == 307 && strpos($token[1], 'Action')) {
                $actions[] = str_replace('Action', '', $token[1]);
            }
        }

        return array_unique($actions);
    }

    private function _controllerIsAlwaysAllowed($source)
    {
        return strpos($source, 'function userAllowed');
    }
    
    private function _controllerIsAjax($source)
    {
        return strpos($source, 'AjaxController');
    }
}
