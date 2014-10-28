<?php

namespace Rebump\Models;

use Framework\Models\DatabaseModel;
use Framework\Session;
use Framework\Utils;
use Framework\Models\User;

class File extends DatabaseModel
{
    const STATUS_PENDING  = 0;
    const STATUS_RUNNING  = 1;
    const STATUS_FINISHED = 2;
    
    const EXTENSION = '.txt';
    const UPLOAD_DIRECTORY = 'rebump';
    
    protected $_table = 'mod_rb_files';
    protected $_primary = 'file_id';
    protected $_cols = array(
        'file_id',
        'user_id',
        'created_date',
        'status',
    );
    
    protected $_statuses = array(
        self::STATUS_PENDING => 'Pending',
        self::STATUS_RUNNING => 'Running',
        self::STATUS_FINISHED => 'Finished',
    );
    
    public function save($params, $key = null)
    {
        if (null === $key) {
            $params['user_id'] = Session::get('user')->getId();
        }
        
        return parent::save($params, $key);
    }
    
    public function findAll()
    {
        $userModel = new User;
        $data = parent::findAll();
        foreach ($data as &$file) {
            $file['user'] = $userModel->find($file['user_id'], false);
            $file['status'] = $this->_statuses[$file['status']];
        }
        
        return $data;
    }
    
    public function newFile()
    {
        $params = array(
            'user_id' => Session::get('user')->getId()
        );
        
        return parent::save($params);
    }
    
    public function getUploadPath($fileId)
    {
        $path = Utils::getUploadPath() . self::UPLOAD_DIRECTORY . '/';
        
        if ($fileId) {
            $path .= $fileId . self::EXTENSION;
        }
        
        return $path;
    }
    
}
