<?php

namespace Debug\Controllers;

use Framework\Config;
use Framework\Library\HttpRequest;

class StatusController extends \Framework\BaseController
{
    protected $_requireLogin = false;

    public function defaultAction()
    {
        $this->_render('Default.twig', array()); 
    }

    public function getAction()
    {
        $databases = array();
        $services = array();
        $doctrineConfig = new \Doctrine\DBAL\Configuration();

        $db = Config::get('db');
        foreach ($db as $key1 => $level1) {
            if (array_key_exists('dbname', $level1)) {
                $conn = \Doctrine\DBAL\DriverManager::getConnection($level1, $doctrineConfig);
                $databases[$key1]['name'] = $level1['dbname'];
                $databases[$key1]['host'] = $level1['host'];
                $databases[$key1]['user'] = $level1['user'];
                try {
                    $conn->connect();
                    $databases[$key1]['success'] = true;
                } catch (\Exception $e) {
                    $databases[$key1]['success'] = false;
                }
            } else {
                foreach ($level1 as $key2 => $level2) {
                    $conn = \Doctrine\DBAL\DriverManager::getConnection($level2, $doctrineConfig);
                    $databases["{$key1}.{$key2}"]['name'] = $level2['dbname'];
                    $databases["{$key1}.{$key2}"]['host'] = $level2['host'];
                    $databases["{$key1}.{$key2}"]['user'] = $level2['user'];
                    try {
                        $conn->connect();
                        $databases["{$key1}.{$key2}"]['success'] = true;
                    } catch (\Exception $e) {
                        $databases["{$key1}.{$key2}"]['success'] = false;
                    }
                }
            }
        }
        
        $servicesConfig = Config::get('services');
        foreach ($servicesConfig as $environment => &$service) {
            foreach ($service as $name => $url) {
                $http = new HttpRequest($url);
                $success = $http->isReachable();
                
                $services[] = array(
                    'environment' => $environment,
                    'name' => $name,
                    'url' => $url,
                    'success' => $success
                );
            }
        }
        
        $http = new HttpRequest(Config::get('framework.push_url'));
        $pusher['success'] = $http->isReachable();

        $this->_render(
            'Status.twig', array(
                'databases' => $databases,
                'services' => $services,
                'pusher' => $pusher,
            )
        );
    }

    public function keepaliveAction()
    {
        /*
            Keepalive ToOlx : If this request is called,  app server OK.
            So, checking DB-Main-Toolx and ABL dependency
        */

        $dbUp  = false;
        $ablUp = false;
      
        $db = Config::get('db');
        if (count($db) > 0) {
            if (array_key_exists('toolx', $db)) {
                if (array_key_exists('dbname', $db['toolx'])) {
                    try {
                        $doctrineConfig = new \Doctrine\DBAL\Configuration();
                        $conn = \Doctrine\DBAL\DriverManager::getConnection($db['toolx'], $doctrineConfig);
                        $conn->connect();
                        $dbUp = true;
                    } catch (\Exception $e) {
                        $dbUp = false;
                    }
                }
           }
        }

        $services = Config::get('services');
        if (count($services) > 0) {
            if (array_key_exists('prod', $services)) {
                if (array_key_exists('abl', $services['prod'])) {
                    try {
                        $http = new HttpRequest($services['prod']['abl']);
                        $ablUp = $http->isReachable();
                    } catch (\Exception $e) {
                        $ablUp = false;
                    }  
                }
            }
        }


       $this->_jsonResponse(
            array(
                'status' => $dbUp && $ablUp, 
                'detail' => array('db' => $dbUp, 'abl' => $ablUp
            ))
        );

    }


    protected function userAllowed()
    {
        return true;
    }
}
