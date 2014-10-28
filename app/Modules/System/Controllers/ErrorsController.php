<?php

namespace System\Controllers;

class ErrorsController extends \Framework\BaseController
{
    protected $_requireLogin = false;

    public function __construct()
    {
        parent::__construct();
    }

    public function notFoundAction()
    {
        $this->_render('NotFound.twig');
    }

    public function internalErrorAction()
    {
        $this->_render('InternalError.twig');
    }

    protected function userAllowed()
    {
        return true;
    }
}
