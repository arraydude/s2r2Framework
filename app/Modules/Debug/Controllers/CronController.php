<?php

namespace Debug\Controllers;

use Framework;
use Framework\Session;
use Framework\HttpException;
use Framework\Models\CronModel;
use Framework\Request;
use Framework\Utils;

class CronController extends \Framework\BaseController
{
    public function defaultAction()
    {
        if (! Session::get('user')->isAdmin()) {
            throw new HttpException('Insufficient privileges', 403);
        }

        $cronModel = new CronModel();
        $crons     = $cronModel->findAll();

        $this->_render('default.twig', array('crons' => $crons));
    }

    public function editAction()
    {
        if (! Session::get('user')->isAdmin()) {
            throw new HttpException('Insufficient privileges', 403);
        }

        $cronId = Request::get('id', false);

        if ($cronId) {
            $cronModel = new CronModel();
            $cron      = $cronModel->find($cronId);
        } else {
            throw new HttpException('no id for this request', 404);
        }

        if (Request::isMethod('POST')) {
            $data                = Request::getAll();
            $cron['name']        = $data['name'];
            $cron['file_name']   = $data['file_name'];
            $cron['description'] = $data['description'];
            $cron['module']      = $data['module'];

            $cronModel->save($cron, $cronId);
            Utils::redirect('/debug/cron/default');
        }

        $this->_render('edit.twig', array('cron' => $cron));
    }
}
