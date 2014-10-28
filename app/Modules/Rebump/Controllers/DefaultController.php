<?php
namespace Rebump\Controllers;

use Rebump\Models\File;

class DefaultController extends \Framework\BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function defaultAction()
    {
        $fileModel = new File();
        $this->_render(
             'Bump.twig', array(
                            'list' => $fileModel->findAll()
                        )
        );
    }
}
