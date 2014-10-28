<?php

namespace Framework;

use Framework\Library\ACL;

class Kernel
{
    public static $loader;
    private $_namespaces = array();
    private $_classMap = array();
    private $_modules = array(
        'twig'   => true,
        'router' => true
    );

    public static function init($modules = array())
    {
        if (is_null(self::$loader)) {
            self::$loader = new self($modules);
        }

        return self::$loader;
    }

    private function __construct($modules)
    {
        $this->_modules = array_merge($this->_modules, $modules);

        $this->loadFWK();

        if ($this->_modules['router']) {
            try {
                $this->execute(Router::init()->components);
            } catch (\Exception $exc) {
                error_log($exc->getMessage());
            }
        }
    }

    /**
     * $module, $controller, $action
     */
    private function execute(array $params)
    {
        $moduleHandler = new ModuleHandler($params['module']);

        if (!is_null($params['controller'])) {
            $moduleHandler->$params['controller']()->actionDispatcher($params['action'] . 'Action');
        } else {
            throw new \Exception('Please specify one controller', 404);
        }
    }

    private function loadFWK()
    {
        require VENDOR_PATH . 'mustangostang/spyc/Spyc.php';
        $this->registerNamespace('Framework', BASE_PATH . 'app');

        $this->register();

        Config::init(
              array(
                  'BASE_PATH'   => BASE_PATH,
                  'CONFIGS_DIR' => BASE_PATH . 'app/Configs/'
              )
        );

        foreach (Config::get('autoloader.namespaces') as $namespace => $path) {
            $this->registerNamespace($namespace, VENDOR_PATH . $path);
        }

        foreach (Config::get('autoloader.classMap') as $class => $path) {
            $this->addClassMap($class, VENDOR_PATH . $path);
        }

        if ($this->_modules['twig']) {
            Library\Twig\Twig::init(BASE_PATH . 'app/');
            Library\Twig\Twig::addNamespace(BASE_PATH . 'app/Framework/Layout', 'Framework');
        }

        foreach (ACL::getModules() as $module) {
            if (is_dir(BASE_PATH . 'app/Modules/' . $module)) {
                $this->registerNamespace($module, BASE_PATH . 'app/Modules/');
                if ($this->_modules['twig']) {
                    try {
                        Library\Twig\Twig::addNamespace(
                                         BASE_PATH . 'app/Modules/' . $module . '/Views/', $module . 'Module'
                        );
                    } catch (\Exception $e) {
                        new HttpException($e->getMessage(), 500);
                        exit;
                    }
                }
            } else {
                new HttpException($module . " module doesn't exists", 500);
                exit;
            }
        }
    }

    public function addClassMap($class, $path)
    {
        $this->_classMap[$class] = $path;
    }

    public function registerNamespace($namespace, $paths)
    {
        $this->_namespaces[$namespace] = (array)$paths;
    }

    public function register($prepend = false)
    {
        $kernel = $this;
        spl_autoload_register(
            function ($class) use ($kernel) {
                if ($file = $kernel->findFile($class)) {
                    require $file;
                }
            },
            true,
            $prepend
        );
    }

    public function findFile($class, $ext = '.php')
    {
        if (isset($this->_classMap[$class])) {
            return $this->_classMap[$class];
        }

        if (false !== $pos = strrpos($class, '\\')) {
            $logicalPathPsr4 = strtr($class, '\\', DIRECTORY_SEPARATOR) . $ext;
            $logicalPathPsr0 = substr($logicalPathPsr4, 0, $pos + 1)
                . strtr(substr($logicalPathPsr4, $pos + 1), '_', DIRECTORY_SEPARATOR);
        } else {
            $logicalPathPsr0 = strtr($class, '_', DIRECTORY_SEPARATOR) . $ext;
        }

        foreach ($this->_namespaces as $prefix => $dirs) {
            if (0 === strpos($class, $prefix)) {
                foreach ($dirs as $dir) {
                    if (file_exists($file = $dir . DIRECTORY_SEPARATOR . $logicalPathPsr0)) {
                        return $file;
                    }
                }
            }
        }
    }
}
