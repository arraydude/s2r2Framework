<?php

namespace Framework\Library\Twig;

use Framework\Config;
use Framework\Session;
use Framework\Utils;
use Framework\Request;

/**
 * Description of Twig
 *
 * @author nahuel
 */
class Twig
{
    public static $instance;
    protected $_loader;
    protected $_twig;

    public static function init($templatesDir)
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($templatesDir);
        }

        return self::$instance;
    }

    private function __construct($templatesDir)
    {
        $this->_loader = new \Twig_Loader_Filesystem($templatesDir);
        $this->_twig   = new \Twig_Environment($this->_loader, array(
            'debug' => true,
            'cache' => BASE_PATH . 'cache/'
        ));

        $this->_addExtensions();
    }

    public static function render($path, $params = array())
    {
        $params = array_merge(
            $params, array(
                       'configs'    => array(
                           'framework' => Config::get('framework')
                       ),
                       'userLogged' => Utils::valid(Session::get('user'), false)
                   )
        );

        echo self::$instance->_twig->render($path, $params);
    }

    public static function getHtmlSource($path, $params = array())
    {
        return self::$instance->_twig->render($path, $params);
    }

    public static function addNamespace($path, $namespace)
    {
        $instance = self::$instance;
        $instance->_loader->addPath($path, $namespace);
    }

    public static function getNamespace($namespace)
    {
        $instance = self::$instance;

        return $instance->_loader->getPaths($namespace);
    }

    protected function _addExtensions()
    {
        $this->_twig->addExtension(new \Twig_Extensions_Extension_I18n());
        $this->_twig->addExtension(new \Twig_Extension_Debug());
        $this->_twig->addExtension(new Extensions\AssetsExtension());
        $this->_twig->addExtension(new Extensions\ACLExtension());
        $this->_twig->addExtension(new Extensions\StringifyExtension());

        $this->_twig->addFilter(
                    new \Twig_SimpleFilter('json_decode', function ($foo) {
                        return json_decode($foo);
                    })
        );

        $this->_twig->addFunction(
                    new \Twig_SimpleFunction('getComponents', function () {
                        return Request::getComponents();
                    })
        );
    }
}
