<?php

namespace Framework;

use Framework\Library\Gettext;

class ModuleHandler
{
    public $name;
    public $path;
    public $lang;

    public function __construct($name)
    {
        $this->name = ucfirst($name);
        $this->path = 'app/Modules/' . $this->name;

        $this->lang = 'en';
        $user       = Session::get('user');
        if (!empty($user)) {
            $this->lang = $user->getLanguageIso();
        }

        $this->loadConfig();
    }

    public function __call($controller, $params)
    {
        if (!is_dir(BASE_PATH . '/app/Modules/' . ucfirst($this->name))) {
            throw new HttpException('URL not found', 404);
        }

        Gettext::init($this->lang, './app/i18n/');

        $nsModule = '\\' . $this->name . '\\Controllers\\' . ucfirst($controller) . 'Controller';

        if (!class_exists($nsModule)) {
            throw new HttpException("Controller {$controller} does not exist", 404);
        }

        return new $nsModule($params);
    }

    private function loadConfig()
    {
        $dir = $this->path . '/Configs/';
        Config::loadConfigs($dir, true);
    }
}
