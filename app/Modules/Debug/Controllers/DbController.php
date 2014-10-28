<?php

namespace Debug\Controllers;

use Framework\Request;
use Framework\Library\DBAL;
use Framework\HttpException;
use Framework\Session;

class DbController extends \Framework\BaseController 
{
    public function defaultAction()
    {
        if (! Session::get('user')->isAdmin()) {
            throw new HttpException('Insufficient privileges', 403);
        }
        
        $success = true;
        
        if ($query = Request::get('query', null)) {
            $conn = DBAL::getConnection('toolx', null, false);
            try {
                $conn->executeQuery($query);
            } catch(\Exception $e) {
                $success = false;
                $error = $e->getMessage();
            }
        }
        
        $this->_render('Default.twig', array(
            'success' => $success,
            'error' => isset($error) ? $error : '',
            'query' => $query,
        ));
    }

    public function splunkAction() 
    {

        if (! Session::get('user')->isAdmin()) {
            throw new HttpException('Insufficient privileges', 403);
        }

        // From Cron test
        openlog('ToOlx-Cron-RunReport', LOG_NDELAY, LOG_USER);
        syslog(LOG_INFO, "Cron start");
        syslog(LOG_INFO, "Execute forEach for country list");
        syslog(LOG_INFO, "End foreach");
        syslog(LOG_INFO, "Cron finished");

        // From one module test
        openlog('ToOlx-Module-Metatag', LOG_NDELAY, LOG_USER);
        syslog(LOG_INFO, "One user enter");
        syslog(LOG_INFO, "User search metas for Argentina");
        syslog(LOG_INFO, "User save new rule");

        echo "Done!";
    }
    
}
