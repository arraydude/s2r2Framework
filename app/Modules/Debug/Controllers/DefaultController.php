<?php

namespace Debug\Controllers;

use Framework\HttpException;
use Framework\Request;
use Framework\Session;
use Framework\Utils;
use Framework;

class DefaultController extends \Framework\BaseController
{
    public function defaultAction()
    {
        if (!Session::get('user')->isAdmin()) {
            throw new HttpException('Insufficient privileges', 403);
        }

        $uploadPath = Utils::getUploadPath();
        $folders    = array();
        $files      = array();
        $rootFiles  = array();

        foreach (new \DirectoryIterator($uploadPath) as $dirInfo) {
            if ($dirInfo->isDot()) continue;

            $dir     = $dirInfo->getFilename();
            $subDirs = array();
            $files   = array();

            if ($dirInfo->isDir()) {
                foreach (new \DirectoryIterator($uploadPath . '/' . $dirInfo->getFilename()) as $subDirInfo) {
                    if ($subDirInfo->isDot()) continue;
                    if ($subDirInfo->isFile()) {
                        $files[] = $subDirInfo->getFilename();
                    } else {

                        $thirdLevelFiles = array();
                        foreach (new \DirectoryIterator($uploadPath . '/' . $dirInfo->getFilename(
                        ) . '/' . $subDirInfo->getFilename()) as $thirdLevelInfo) {
                            if ($subDirInfo->isDot()) continue;

                            if ($thirdLevelInfo->isFile()) {
                                $thirdLevelFiles[] = $thirdLevelInfo->getFilename();
                            }
                        }

                        $subDir    = array('name' => $subDirInfo->getFilename(), 'files' => $thirdLevelFiles);
                        $subDirs[] = $subDir;
                    }
                }

                $dirInfo   = array('name' => $dir, 'subfolders' => $subDirs, 'files' => $files);
                $folders[] = $dirInfo;
            } else {
                $rootFiles[] = $dir;
            }
        }

        $this->_render('fileExplorer.twig', array('folders' => $folders, 'rootFiles' => $rootFiles));
    }

    public function downloadAction()
    {
        if (!Session::get('user')->isAdmin()) {
            throw new HttpException('Insufficient privileges', 403);
        }

        $file = Request::get('file', false);

        $file = str_replace("..", "", $file);
        $file = str_replace(".php", "", $file);
        $file = str_replace(".twig", "", $file);
        $file = str_replace(".yml", "", $file);

        $currentFile = Utils::getUploadPath() . $file;

        if (file_exists($currentFile)) {
            $this->_downloadHeaders($currentFile);
            readfile($currentFile);
        } else {
            $this->_jsonResponse(array('error' => 'The file does not exists'));
        }
    }

    public function infoAction()
    {
        if (!Session::get('user')->isAdmin()) {
            throw new HttpException('Insufficient privileges', 403);
        }

        ob_start();
        phpinfo();
        $pinfo = ob_get_contents();
        ob_end_clean();

        $pinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $pinfo);

        $this->_render('phpInfo.twig', array('pInfo' => $pinfo));
    }

    private function _downloadHeaders($file)
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
    }
}
