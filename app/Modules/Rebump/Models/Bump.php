<?php

namespace Rebump\Models;

use Framework\Library\AblRestProvider;

class Bump extends AblRestProvider
{
    public function __construct($environment = 'prod')
    {
        parent::__construct($environment);
    }
    
    public function bump($itemId)
    {
        $this->setMethod(HTTP_METH_POST);
        $this->resetParams();
        
        $this->addParam('item')
                    ->addParam('bump-up')
                    ->addParam($itemId);
        
        try {
            $this->getResponse();
            $return = array(
                'success' => true,
                'error' => ''
            );
        } catch(\Exception $e) {
            $return = array(
                'success' => false,
                'error' => $e->getMessage()
            );
        }
        
        return $return;
    }
    
}
