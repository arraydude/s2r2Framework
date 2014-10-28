<?php

namespace Framework\Models;

use Framework\Config;

class Market
{
    final public static function find($name)
    {
        $markets = Config::get('markets');
        
        return isset($markets[$name]) ? $markets[$name] : 'Unknown';
    }
    
    final public static function findById($marketId)
    {
        $markets = Config::get('markets');
        
        foreach ($markets as $market) {
            if ($market['id'] == $marketId) {
                return $market['name'];
            }
        }
        
        return null;
    }
    
    final public static function getAll()
    {
        $return = array();
        
        foreach (Config::get('markets') as $market) {
            $return[$market['id']] = $market['name'];
        }
        
        return $return;
    }
    
}
