<?php

namespace Framework;

use Framework\Library\ACL;
use Framework\Models\Log;

/**
 * Description of Logger
 *
 * @author nahuel
 */
class Logger
{
    public static $loader; //self instance

    /**
     * Initialize Logger object
     *
     * @return self
     */

    public static function init()
    {
        if (is_null(self::$loader)) {
            self::$loader = new self();
        }

        return self::$loader;
    }

    private function __construct()
    {
    }

    public static function logAction($params)
    {
        if (!ACL::isLogged()) {
            return false;
        }

        $components = Request::getComponents();

        $namespace = '';
        $namespace .= strtolower($components->module) . '_';
        $namespace .= strtolower($components->controller) . '_';
        $namespace .= strtolower($components->action);

        if (!in_array($namespace, Config::get('framework.logger.exclude', array()))) {
            try {
                $log = new Log;
                $log->save(
                    array(
                        'user_id'    => Session::get('user')->getId(),
                        'module'     => $components->module,
                        'controller' => $components->controller,
                        'action'     => $components->action,
                        'params'     => json_encode($params)
                    )
                );
            } catch (\Exception $exc) {
                return false;
            }
        }

        return true;
    }
}
