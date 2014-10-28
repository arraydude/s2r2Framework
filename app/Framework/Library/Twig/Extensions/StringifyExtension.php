<?php

namespace Framework\Library\Twig\Extensions;

use Framework\Library\Twig\Twig;

class StringifyExtension extends \Twig_Extension
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
            new \Twig_SimpleFunction('stringifyTwig', array($this, 'stringifyTwig')),
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'Stringify';
    }

    /**
     * Returns if the user is allowed to perform that action
     *
     * @param string $privilege
     *
     * @return boolean
     */
    public function stringifyTwig($twig, $namespace = "Framework")
    {
        $paths = Twig::getNamespace($namespace);
        $path  = $paths[0] . $twig;

        //$string = $this->trimHTML(file_get_contents($path));
        $json = json_encode(
            array(
                'string' => file_get_contents($path)
            )
        );

        return $json;
    }
}
