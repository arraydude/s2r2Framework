<?php
require_once 'bootstrap.php';

$cron = new \Rebump\Crons\RebumpCron();
$cron->run();
