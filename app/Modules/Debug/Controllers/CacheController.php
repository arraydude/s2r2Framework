<?php

namespace Debug\Controllers;

use Framework;
use Framework\Request;
use Framework\Session;
use Debug\Library\ApcStats;
use Framework\HttpException;

class CacheController extends \Framework\BaseController 
{
    public function defaultAction() 
    {
        if (! Session::get('user')->isAdmin()) 
        {
            throw new HttpException('Insufficient privileges', 403);
        }

        $this->_render('cacheAdm.twig', array(
            'apcList'   => $this->_getApcList(),
            'apcStats'  => $this->_getApcStats(),
        ));
    }

    public function deleteAction() 
    {
        if (! Session::get('user')->isAdmin()) 
        {
            throw new HttpException('Insufficient privileges', 403);
        }

        $key = Request::get('key', false);

        if ($key) 
        {
            apc_delete($key);
        }

        $this->_render('cacheAdm.twig', array(
            'apcList'   => $this->_getApcList(),
            'apcStats'  => $this->_getApcStats(),
        ));
    }

    private function _getApcList()
    {
        $apcIterator = new  \APCIterator('user');
        $apcList = array();

        foreach ($apcIterator as $oneItem) 
        {
            $apcList[] = array(
                'key' => $oneItem['key'], 'value' => $oneItem['value'], 
                'hits' => $oneItem['num_hits'], 
                'size' => ApcStats::formatBytes($oneItem['mem_size']),
            );
        }

        return $apcList;
    }

    private function _getApcStats() 
    {
        $apcStats = new ApcStats;

        $used  = $apcStats->getUsedMemory();
        $free  = $apcStats->getAvailableMemory();
        $total = $apcStats->getTotalMemory();

        $stats = array(
            'totalMemory'   => $apcStats->formatBytes($total),
            'usedMemory'    => $apcStats->formatBytes($used),
            'freeMemory'    => $apcStats->formatBytes($free),
            'usedPercent'   => $apcStats->getPercent($used, $total),
            'freePercent'   => $apcStats->getPercent($free, $total),
        );

        return $stats;
    }
}
