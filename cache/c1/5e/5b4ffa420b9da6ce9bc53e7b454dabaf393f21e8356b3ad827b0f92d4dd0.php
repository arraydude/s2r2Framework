<?php

/* @DebugModule/Default/phpInfo.twig */
class __TwigTemplate_c15e5b4ffa420b9da6ce9bc53e7b454dabaf393f21e8356b3ad827b0f92d4dd0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Framework/Base.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Framework/Base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["phpInfoActive"] = true;
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"main-box clearfix\">
                ";
        // line 7
        if (isset($context["pInfo"])) { $_pInfo_ = $context["pInfo"]; } else { $_pInfo_ = null; }
        echo $_pInfo_;
        echo "
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@DebugModule/Default/phpInfo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  33 => 4,  30 => 3,  25 => 2,);
    }
}
