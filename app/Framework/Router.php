<?php

namespace Framework;

class Router
{
    public static $loader;
    public $components = array();

    public static function init()
    {
        if (is_null(self::$loader)) {
            self::$loader = new self();
        }

        return self::$loader;
    }

    private function __construct()
    {
        if (Request::uri()) {
            $this->components = array(
                'module'     => Request::getComponents()->module,
                'controller' => Request::getComponents()->controller,
                'action'     => Request::getComponents()->action
            );
        } else {
            $this->components = Config::get('framework.default_components');
        }
    }

    public static function getUrlFromModule($module, $controller = false, $action = false)
    {
        $fwkConfig = Config::get('framework');

        $url = $fwkConfig['base_url'] . '/' . strtolower($module);

        if ($controller) {
            $url .= '/' . strtolower($controller);
        }

        if ($action) {
            $url .= '/' . strtolower($action);
        }

        return $url;
    }
}
