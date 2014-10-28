<?php

ini_set('display_errors', '1');
error_reporting(E_ALL | E_NOTICE);

define('BASE_PATH', __DIR__ . '/');
define('BIN_PATH', BASE_PATH . 'bin/');
define('VENDOR_PATH', __DIR__ . '/app/vendor/');

require_once BASE_PATH . 'app/Framework/Kernel.php';

Framework\Kernel::init();