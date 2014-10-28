<?php

namespace System\Controllers;

use Framework\Request;

class ActivityController extends \Framework\BaseController
{
    const ACTIVITIES_LIMIT = 10;

    public function defaultAction()
    {
        $dateBetween = Request::get('dateBetween', false);
        $page        = Request::get('page', 1);
        $search      = Request::get('search', null);

        $activityModel = new \Framework\Models\Log();

        if ($dateBetween) {
            if ($dateBetween['from'] == $dateBetween['to']) {
                $dateBetween['from'] .= ' 00:00:00';
                $dateBetween['to'] .= ' 23:59:59';
            }
        }
        $activityModel
            ->setSearchVar('orderBy', array('created_date' => 'desc'))
            ->setSearchVar('max', self::ACTIVITIES_LIMIT)
            ->setSearchVar('offset', ($page - 1) * self::ACTIVITIES_LIMIT)
            ->setSearchVar('dateBetween', $dateBetween)
            ->setSearchVar('search', $search);

        $activities = $activityModel->getLogsWithUser();

        if (Request::get('jsonResponse', false)) {
            $this->_jsonResponse(
                array(
                    'elements' => $activities,
                    'addMore' => true //@toDo: Add more functionality
                )
            );
        } else {
            $this->_render(
                'List.twig',
                array(
                    'activities'      => $activities,
                    'countActivities' => $activityModel->countBy(array()),
                    'dateBetween'     => $dateBetween,
                    'search'          => $search
                    )
            );
        }
    }

    public function ajaxDebugParamsAction()
    {
        $params = Request::get('params', false);

        $this->_render('DebugParams.twig', array('params' => $params));
    }
}
