<?php

/* @SystemModule/Default/GlobalsJS.twig */
class __TwigTemplate_8b4a9eb9d184b8ce7dd85b32d73c0a2bab7ab3b81943a455765c33ce16fdfc7c extends Twig_Template
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
        echo "var FWK = {
    configs: ";
        // line 2
        if (isset($context["configs"])) { $_configs_ = $context["configs"]; } else { $_configs_ = null; }
        echo twig_jsonencode_filter($_configs_);
        echo ",
    userLogged: {
        id: ";
        // line 4
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        echo twig_jsonencode_filter($this->getAttribute($_userLogged_, "id"));
        echo ",
        perms: ";
        // line 5
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        echo twig_jsonencode_filter($this->getAttribute($_userLogged_, "getPrivileges"));
        echo ",
        email: ";
        // line 6
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        echo twig_jsonencode_filter($this->getAttribute($_userLogged_, "getEmail"));
        echo ",
        name: ";
        // line 7
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        echo twig_jsonencode_filter($this->getAttribute($_userLogged_, "getName"));
        echo ",
        username: ";
        // line 8
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        echo twig_jsonencode_filter($this->getAttribute($_userLogged_, "getUsername"));
        echo "
    }
};
";
    }

    public function getTemplateName()
    {
        return "@SystemModule/Default/GlobalsJS.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 8,  43 => 7,  38 => 6,  33 => 5,  28 => 4,  22 => 2,  19 => 1,);
    }
}
