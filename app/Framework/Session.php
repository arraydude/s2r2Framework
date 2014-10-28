<?php

namespace Framework;

class Session
{
    private static $_initialized;

    private function init()
    {
        if (!self::$_initialized) {
            session_start();
            self::$_initialized = true;
        }
    }

    public static function get($key)
    {
        self::init();

        return isset($_SESSION[$key]) ? unserialize($_SESSION[$key]) : false;
    }

    public static function set($key, $value)
    {
        self::init();
        $_SESSION[$key] = serialize($value);
    }

    public static function delete($key)
    {
        unset($_SESSION[$key]);
    }

    public static function addFlashMessage($message, $title = '', $icon = '', $type = 'success')
    {
        $_SESSION['flashMessages'][] = array(
            'message' => $message,
            'title'   => $title,
            'icon'    => $icon,
            'type'    => $type,
        );
    }

    public static function getFlashMessages()
    {
        if (isset($_SESSION['flashMessages'])) {
            $messages                  = $_SESSION['flashMessages'];
            $_SESSION['flashMessages'] = array();
        } else {
            $messages = array();
        }

        return json_encode($messages);
    }
}
