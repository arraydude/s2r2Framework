<?php

namespace Framework\Library;

use Framework\Utils;

class jarHandler
{
    private $file;
    private $encoding = 'UTF-8';
    private $module = null;
    private $params = array();

    public function __construct($file, $module = null)
    {
        if (file_exists(BIN_PATH . $file)) {
            $this->file = BIN_PATH . $file;
        } else {
            throw new \Exception('The jar doesnt exists');
        }

        if (!is_null($module)) {
            $this->setModule($module);
        }

        return $this;
    }

    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;

        return $this;
    }

    public function execute()
    {
        $execString = $this->getExecString();
        return shell_exec($execString);
    }

    public function getExecString()
    {
        return "java -Dfile.encoding={$this->encoding} -cp .:{$this->file} {$this->module} " . $this->generateParams();
    }

    public function __call($name, $args)
    {
        $param = str_replace('set-', '', Utils::revertCamelize($name, '-'));

        if ($param) {
            $this->params[$param] = $args[0];
        }

        return $this;
    }

    private function generateParams()
    {
        $paramsString = '';
        foreach ($this->params as $key => $value) {
            $paramsString .= '-' . $key . ' ' . $value . ' ';
        }


        return $paramsString;
    }
}