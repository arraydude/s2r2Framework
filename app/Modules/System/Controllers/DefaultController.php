<?php

namespace System\Controllers;

use Framework\Config;
use Framework\Utils;

class DefaultController extends \Framework\BaseController
{
    protected $_requireLogin = false;

    public function defaultAction()
    {
        Utils::redirect('/system/dashboard');
    }

    protected function userAllowed()
    {
        return true;
    }

    public function globalsJSAction()
    {
        $this->_render(
             'GlobalsJS.twig', array(
                                 'configs' => Config::getAll()
                             ),
             'application/javascript'
        );
    }
}
