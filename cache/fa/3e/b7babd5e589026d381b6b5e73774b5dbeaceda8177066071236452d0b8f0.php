<?php

/* Modules/System/Views/Errors/NotFound.twig */
class __TwigTemplate_fa3eb7babd5e589026d381b6b5e73774b5dbeaceda8177066071236452d0b8f0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Framework/Base.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'container' => array($this, 'block_container'),
            'content' => array($this, 'block_content'),
            'foot' => array($this, 'block_foot'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Framework/Base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["idBody"] = "error-page";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
    }

    // line 7
    public function block_container($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"row\">
    ";
        // line 9
        $this->displayBlock('content', $context, $blocks);
        // line 11
        echo "    <div class=\"col-xs-12\">
        <div id=\"error-box\">
            <div class=\"row\">
                <div class=\"col-xs-12\">
                    <div id=\"error-box-inner\">
                        <img src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("img/error-404-v3.png", "system"), "html", null, true);
        echo "\" alt=\"Have you seen this page?\"/>
                    </div>
                    ";
        // line 18
        if ((array_key_exists("code", $context) && array_key_exists("message", $context))) {
            // line 19
            echo "                        <h1>ERROR ";
            if (isset($context["code"])) { $_code_ = $context["code"]; } else { $_code_ = null; }
            echo twig_escape_filter($this->env, $_code_, "html", null, true);
            echo "</h1>
                        <p>";
            // line 20
            if (isset($context["message"])) { $_message_ = $context["message"]; } else { $_message_ = null; }
            echo twig_escape_filter($this->env, $_message_, "html", null, true);
            echo "</p>
                    ";
        } else {
            // line 22
            echo "                        <h1>ERROR 404</h1>
                        <p>Page not found.<br/>If you find this page, let us know.</p>
                    ";
        }
        // line 25
        echo "                    <p>Go back to <a href=\"";
        if (isset($context["configs"])) { $_configs_ = $context["configs"]; } else { $_configs_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_configs_, "framework"), "base_url"), "html", null, true);
        echo "\">homepage</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "    ";
    }

    // line 33
    public function block_foot($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Modules/System/Views/Errors/NotFound.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 33,  93 => 10,  90 => 9,  77 => 25,  72 => 22,  66 => 20,  60 => 19,  58 => 18,  53 => 16,  46 => 11,  44 => 9,  41 => 8,  38 => 7,  33 => 4,  28 => 2,);
    }
}
