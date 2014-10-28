<?php

namespace Framework;

use Framework\Library\ACL;
use Framework\Library\Twig\Twig;

abstract class BaseController
{
    protected $_requireLogin = true;

    public function __construct()
    {
    }

    private function _validateLogin()
    {
        if ($this->_requireLogin) {
            if (!ACL::isLogged()) {
                $components = (array)Request::getComponents();
                $from       = implode('_', $components);

                Session::set('fromParams', Request::getAll());

                Utils::redirect('/system/login?from=' . $from);
            }
        }
    }

    final public function actionDispatcher($method, $params = array())
    {
        $this->_validateLogin();

        if (!method_exists($this, $method)) {
            throw new HttpException('The requested action does not exists', 404);
        }

        if ($this->userAllowed() || !$this->_requireLogin) {
            $params = array_merge($params, Request::getAll());

            if ($this->_requireLogin) {
                Logger::logAction($params);
            }

            $this->$method($params);
        } else {
            throw new HttpException('Insufficient privileges to access this page', 403);
        }
    }

    protected function userAllowed()
    {
        $location = (array)Request::getComponents();

        return ACL::allowed(strtolower(implode('_', $location)));
    }

    final protected function _jsonResponse($data)
    {
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-Control: no-cache, must-revalidate');
        echo json_encode($data);
    }
    
    final protected function _csvResponse($filename)
    {
        header("Content-type: text/csv");
        header('Content-Disposition: attachment; filename="'.$filename.'.csv"');
    }

    final protected function _render($view, $params = array(), $contentType = 'text/html')
    {
        $components = Request::getComponents();
        $namespace  = '@' . ucfirst($components->module) . 'Module';
        $controller = '/' . ucfirst($components->controller) . '/';

        $params = array_merge(
            array('userLogged' => Session::get('user')),
            $params
        );

        if (Request::getHTTP('json', false)) {
            $this->_jsonResponse($params);
        } else {
            header("Content-Type: $contentType; charset=utf-8");
            Twig::render($namespace . $controller . $view, $params);
        }
    }
}
