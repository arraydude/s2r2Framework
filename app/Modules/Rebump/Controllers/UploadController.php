<?php
namespace Rebump\Controllers;

use Framework\Request;
use Rebump\Models\File;
use Framework\Session;

class UploadController extends \Framework\BaseController
{
    public function BumpFileAction()
    {
        $fileModel = new File;
        $fileId    = $fileModel->newFile();

        $file            = Request::getFile('file');
        $destinationPath = $fileModel->getUploadPath($fileId);

        try {
            move_uploaded_file($file['tmp_name'], $destinationPath);

            $this->_jsonResponse(
                 array(
                     'file_id'      => $fileId,
                     'user'         => \Framework\Session::get('user')->getName(),
                     'created_date' => date('Y-m-d H:i:s'),
                     'status'       => File::STATUS_PENDING
                 )
            );
        } catch (Exception $e) {
            header("Status: 500 Server Error");
            header('HTTP/1.1 500 Internal Server Error');

            echo $e->getMessage();
        }
    }
    
    public function singleBumpAction()
    {
        if ($itemId = Request::get('itemId', false)) {
            $bump = new \Rebump\Models\Bump();
            $response = $bump->bump($itemId);

            if (false === $response['success']) {
                if (! Session::get('user')->isAdmin()) {
                    $aux = explode('BODY: ', $response['error']);
                    $response['error'] = $aux[1];
                }
            }

            $this->_jsonResponse($response);
        }
    }
    
}
