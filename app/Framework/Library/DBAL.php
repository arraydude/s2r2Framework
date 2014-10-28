<?php

namespace Framework\Library;

use Framework\Config;

/**
 * Description of DBAL
 *
 * @author nahuel
 */
class DBAL
{
    public static $instances = array();
    protected $config;
    public $conn;

    public static function getConnection($database, $environment, $master)
    {
        $key = self::_getDatabaseKey($database, $environment, $master);

        if (! array_key_exists($key, self::$instances)) {
            self::$instances[$key] = new self($key);
        }

        return self::$instances[$key]->conn;
    }
    
    private static function _getDatabaseKey($database, $environment, $master)
    {
        $key = 'db.';
        
        if (! is_null($environment)) {
            ACL::validateEnvironmentLevel($environment);
            $key .= strtolower($environment) . '.';
        }
        
        $key .= $database;
        
        if ($master) {
            $key .= '_master';
        }
        
        return $key;
    }

    private function __construct($key)
    {
        $doctrineConfig = new \Doctrine\DBAL\Configuration();
        $this->config   = Config::get($key);
        $this->conn     = \Doctrine\DBAL\DriverManager::getConnection($this->config, $doctrineConfig);

        return $this;
    }

}
