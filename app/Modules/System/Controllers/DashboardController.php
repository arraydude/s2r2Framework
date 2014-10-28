<?php

namespace System\Controllers;

use Framework\Config;
use Framework\Session;

class DashboardController extends \Framework\BaseController
{
    public function defaultAction()
    {
        $this->_render(
            'Dashboard.twig', array(
                'modules' => Session::get('user')->getModules()
            )
        );
    }
    
    protected function userAllowed()
    {
        return true;
    }
}
