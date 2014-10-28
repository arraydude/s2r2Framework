<?php
define('BASE_PATH', str_replace('batch/', '', __DIR__ . '/'));
define('BIN_PATH', BASE_PATH . 'bin/');
define('VENDOR_PATH', BASE_PATH . '/app/vendor/');


require_once BASE_PATH . 'app/Framework/Kernel.php';

Framework\Kernel::init(
                array(
                    'router' => false,
                )
);
