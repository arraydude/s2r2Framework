<?php

namespace Framework\Library;

use Framework\Config;

class SocketEmitter extends HttpRequest
{
    public function __construct($module, $action)
    {
        $url = Config::get('framework.push_url') . '/push';
        parent::__construct($url);
        
        $this->addParam('module', $module);
        $this->addParam('action', $action);
    }
    
    public function __call($method, $params)
    {
        $method = strtolower(str_replace('set', '', $method));
        $this->addParam($method, reset($params));
        
        return $this;
    }
    
    public function emit(array $message)
    {
        $message = json_encode($message);

        $this->setMethod(HTTP_METH_POST)
             ->setContentType(HttpRequest::CONTENT_JSON)
             ->setBody($message)
             ->_tryGetResponse();
    }
}
