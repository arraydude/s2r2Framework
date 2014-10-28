<?php

/* @TestModule/menu.twig */
class __TwigTemplate_dfb2017d9c84d6688bca6eddb5d33cc8297177ecafc4067de6c848c9b52cb8a1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<a href=\"/Test\" class=\"menu dropdown-toggle\"> <i class=\"fa fa-gear\"></i> <span>Test</span> <i class=\"fa fa-chevron-circle-down drop-icon\"></i> </a> <ul class=\"submenu\" ";
        if (isset($context["moduleActive"])) { $_moduleActive_ = $context["moduleActive"]; } else { $_moduleActive_ = null; }
        if ($_moduleActive_) {
            echo "style=\"display:block;\"";
        }
        echo "> <li><a ";
        if (isset($context["migrationManagerModuleActive"])) { $_migrationManagerModuleActive_ = $context["migrationManagerModuleActive"]; } else { $_migrationManagerModuleActive_ = null; }
        if ($_migrationManagerModuleActive_) {
            echo "class=\"active\"";
        }
        echo " href=\"/Test/default/default\">Default Action</a></li> </ul>
";
    }

    public function getTemplateName()
    {
        return "@TestModule/menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
