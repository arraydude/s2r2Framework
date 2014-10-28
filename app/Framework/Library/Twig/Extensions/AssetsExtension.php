<?php

namespace Framework\Library\Twig\Extensions;

use Framework\Config;
use Framework\Request;

class AssetsExtension extends \Twig_Extension
{
    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return array An array of Twig_TokenParserInterface or Twig_TokenParserBrokerInterface instances
     */
    public function getTokenParsers()
    {
        return array(new \Twig_Extensions_TokenParser_Trans());
    }

    /**
     * Returns a list of global functions to add to the existing list.
     *
     * @return array An array of global functions
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('asset', array($this, 'generateRoute')),
            new \Twig_SimpleFunction('gravatarUrl', array($this, 'generateGravatar')),
            new \Twig_SimpleFunction('getConfig', array($this, 'getConfig')),
            new \Twig_SimpleFunction('getProfilePhoto', array($this, 'getProfilePhoto'))
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'assets';
    }

    public function generateRoute($file, $module = false)
    {
        $fwkConfig = Config::get('framework');

        if ($module) {
            $moduleUrl = $module . '/';
        } else {
            $components = Request::getComponents();
            $moduleUrl  = $components->module . '/';
        }

        $path = $fwkConfig['base_url'] . '/app/Modules/' . ucfirst($moduleUrl) . 'Public/' . $file;

        return $path;
    }

    public function generateGravatar($mail)
    {
        return \Framework\Utils::getGravatarUrl($mail);
    }

    public function getProfilePhoto($profilePhoto, $email, $size=35) {
        return \Framework\Utils::getProfilePhotoUrl($profilePhoto, $email, $size);
    }

    public function getConfig($config, $default = null)
    {
        return Config::get($config, $default);
    }
}
