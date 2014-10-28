<?php

namespace Framework\Models;

class CronModel extends DatabaseModel
{
    protected $_table = 'mod_dbg_crons';
    protected $_primary = 'cron_id';
    protected $_cols = array(
        'cron_id',
        'name',
        'description',
        'file_name',
        'module',
        'frequency',
        'last_execution',
        'enabled',
        'ticket'
    );
}
