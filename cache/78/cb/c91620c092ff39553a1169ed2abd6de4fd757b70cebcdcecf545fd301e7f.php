<?php

/* @TestModule/Default/Default.twig */
class __TwigTemplate_78cbc91620c092ff39553a1169ed2abd6de4fd757b70cebcdcecf545fd301e7f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Framework/Base.twig");

        $this->blocks = array(
            'jsResources' => array($this, 'block_jsResources'),
            'cssResources' => array($this, 'block_cssResources'),
            'head' => array($this, 'block_head'),
            'container' => array($this, 'block_container'),
            'foot' => array($this, 'block_foot'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Framework/Base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_jsResources($context, array $blocks = array())
    {
    }

    // line 6
    public function block_cssResources($context, array $blocks = array())
    {
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
    }

    // line 12
    public function block_container($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"clearfix\">
        <h1 class=\"pull-left\">";
        // line 14
        echo twig_escape_filter($this->env, gettext("Module Name"), "html", null, true);
        echo "</h1>
    </div>

    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"main-box clearfix\">
                <h3> ";
        // line 20
        if (isset($context["param1"])) { $_param1_ = $context["param1"]; } else { $_param1_ = null; }
        echo twig_escape_filter($this->env, $_param1_, "html", null, true);
        echo " </h2> 
                <h3> ";
        // line 21
        if (isset($context["param2"])) { $_param2_ = $context["param2"]; } else { $_param2_ = null; }
        echo twig_escape_filter($this->env, $_param2_, "html", null, true);
        echo " </h2>
                <h3> ";
        // line 22
        if (isset($context["paramN"])) { $_paramN_ = $context["paramN"]; } else { $_paramN_ = null; }
        echo twig_escape_filter($this->env, $_paramN_, "html", null, true);
        echo " </h2> 
            </div>
        </div>
    </div>
";
    }

    // line 28
    public function block_foot($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@TestModule/Default/Default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 28,  72 => 22,  67 => 21,  62 => 20,  53 => 14,  50 => 13,  47 => 12,  42 => 9,  37 => 6,  32 => 3,);
    }
}
