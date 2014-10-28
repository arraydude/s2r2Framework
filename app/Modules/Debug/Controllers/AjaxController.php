<?php

namespace Debug\Controllers;

use Framework\Models\CronModel;
use Framework\Request;

class AjaxController extends \Framework\AjaxController
{
    public function toggleCronEnableAction()
    {
        $cronId     = Request::get('cronId', false);
        $enabled    = Request::get('enabled', false);
        $cronModel  = new CronModel();
        $status     = false;
        $errors     = array();

        try {
            $cronModel->save(array('enabled' => $enabled), $cronId);
            $status = true;
        } catch (\Exception $e) {
            $errors[] = "error trying to save";
        }

        $this->_jsonResponse(array('success' => $status, 'errors' => $errors));
    }
}
