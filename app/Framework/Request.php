<?php

namespace Framework;

class Request
{
    public static function get($foo, $return)
    {
        return Utils::valid($_REQUEST[$foo], $return);
    }
    
    public static function getFile($foo)
    {
        return $_FILES[$foo];
    }

    public static function getAll()
    {
        return array_merge($_POST, $_GET, $_FILES);
    }

    public static function uri()
    {
        return substr($_SERVER['REQUEST_URI'], 1);
    }

    public static function getHTTP($key, $return)
    {
        $headers = apache_request_headers();

        return Utils::valid($headers[$key], $return);
    }

    /**
     *
     * @return \ArrayObject module|controller|action
     */
    public static function getComponents()
    {
        $uriComponents = explode("?", self::uri());
        $uriComponents = explode("/", $uriComponents[0]);

        $defaultComponents = Config::get('framework.default_components');

        $object             = new \stdClass();
        $object->module     = !empty($uriComponents[0]) ? $uriComponents[0] : $defaultComponents['module'];
        $object->controller = !empty($uriComponents[1]) ? $uriComponents[1] : $defaultComponents['controller'];
        $object->action     = !empty($uriComponents[2]) ? $uriComponents[2] : $defaultComponents['action'];

        return $object;
    }

    /**
     * Which request method was used to access the page; i.e. 'GET', 'HEAD', 'POST', 'PUT'.
     *
     * @var $method string
     * @return Boolean
     */
    public static function isMethod($method)
    {
        return ($method == $_SERVER['REQUEST_METHOD']);
    }

    /**
     * return true/false if the variable exist on the request
     *
     * @var $value string
     * @return Boolean
     */
    public static function exist($value)
    {
        return isset($_REQUEST[$value]);
    }
    
    public static function isAjax()
    {
        return ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    }
}
