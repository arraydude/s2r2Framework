<?php

namespace Framework\Library\Twig\Extensions;

use Framework\Library\ACL;

class ACLExtension extends \Twig_Extension
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
            new \Twig_SimpleFunction('has_privilege', array($this, 'hasPrivilege')),
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'ACL';
    }

    /**
     * Returns if the user is allowed to perform that action
     *
     * @param string $privilege
     *
     * @return boolean
     */
    public function hasPrivilege($privilege)
    {
        $url = (array)\Framework\Request::getComponents();

        $privilege = explode('_', $privilege);

        $keys = array_slice(array('module', 'controller', 'action'), 3 - count($privilege), count($privilege));

        $privilege = array_combine($keys, $privilege);
        $privilege = array_merge($url, $privilege);
        $privilege = strtolower(implode('_', $privilege));

        return ACL::allowed($privilege);
    }
}
