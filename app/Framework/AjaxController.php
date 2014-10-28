<?php

namespace Framework;

use Framework\Library\ACL;

abstract class AjaxController extends BaseController
{
    protected function userAllowed()
    {
        $location = (array)Request::getComponents();
        $location['controller'] = 'default';
        $location['action'] = 'default';

        return ACL::allowed(strtolower(implode('_', $location)));
    }

}
