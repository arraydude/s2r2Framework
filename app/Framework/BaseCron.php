<?php

namespace Framework;

use Framework\Models\CronModel;

abstract class BaseCron
{
    private $_fileName;

    private $_debug;

    final public function __construct()
    {
        global $argv;
        $this->_fileName = array_pop(explode("/", $_SERVER['SCRIPT_NAME']));
        $logName         = array_shift(explode(".", $this->_fileName));
        $this->_debug    = (array_pop($argv) == 'debug') ? true : false;
        openlog('ToOlx-Cron-' . $logName, LOG_NDELAY, LOG_USER);
    }
    final public function run()
    {
        $cronModel = new CronModel();
        $cron      = $cronModel->fetch(array('file_name' => $this->_fileName));
        if ($cron['enabled']) {
            $date = new \DateTime();
            $cron['last_execution'] = $date->format('Y-m-d H:i:s');
            $cronModel->save($cron, $cron['cron_id']);
            $this->writeOutput('Cron start');
            $this->_execute();
            $this->writeOutput('Cron finished');
        }
    }

    public function writeOutput($output, $type = LOG_INFO)
    {
        syslog($type, $output);

        if ($this->_debug) {
            echo $output."\n";
            ob_flush();
        }
    }

    abstract protected function _execute();
}
