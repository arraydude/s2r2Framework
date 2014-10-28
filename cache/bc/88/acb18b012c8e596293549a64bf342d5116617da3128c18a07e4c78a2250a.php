<?php

/* @SystemModule/Login/Login.twig */
class __TwigTemplate_bc88acb18b012c8e596293549a64bf342d5116617da3128c18a07e4c78a2250a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Framework/Base.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'cssResources' => array($this, 'block_cssResources'),
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
        $context["idBody"] = "";
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
    }

    // line 7
    public function block_cssResources($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("cssResources", $context, $blocks);
        echo "
    <style type=\"text/css\">
        #login-box-inner .login-logo{
            text-align: center;
            font-size: 3em;
            padding-bottom: 30px;
            color: #72A7AB;
        }

        #login-box-inner .login-logo .icon-isologo {
            margin-right: 15px;
        }
    </style>
";
    }

    // line 23
    public function block_container($context, array $blocks = array())
    {
        // line 24
        echo "    <div class=\"row\">
        ";
        // line 25
        $this->displayBlock('content', $context, $blocks);
        // line 27
        echo "        <div class=\"col-xs-12\">
            <div id=\"login-box\" class=\"fade-in\">
                <div class=\"row\">
                    <div class=\"col-xs-12 clearfix\" id=\"login-box-header\">
                        <div class=\"login-box-header-red\"></div>
                        <div class=\"login-box-header-green\"></div>
                        <div class=\"login-box-header-yellow\"></div>
                        <div class=\"login-box-header-purple\"></div>
                        <div class=\"login-box-header-blue\"></div>
                        <div class=\"login-box-header-gray\"></div>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-xs-12\">
                        <div id=\"login-box-inner\">
                            <div id=\"login-logo\" class=\"brand-font\">
                                <i class=\"icon-isologo\"></i>toolx
                            </div>

                            ";
        // line 46
        if (isset($context["error"])) { $_error_ = $context["error"]; } else { $_error_ = null; }
        if ($_error_) {
            // line 47
            echo "                                <div class=\"alert alert-warning fade in\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×
                                    </button>
                                    <i class=\"fa fa-warning fa-fw fa-lg\"></i>
                                    <strong>Warning!</strong> ";
            // line 51
            if (isset($context["error"])) { $_error_ = $context["error"]; } else { $_error_ = null; }
            echo twig_escape_filter($this->env, gettext($_error_), "html", null, true);
            echo "
                                </div>
                            ";
        }
        // line 54
        echo "
                            <form action=\"/system/login/login\" method=\"post\" name=\"login\" role=\"form\">
                                ";
        // line 56
        if (isset($context["from"])) { $_from_ = $context["from"]; } else { $_from_ = null; }
        if ($_from_) {
            // line 57
            echo "                                    <input type=\"hidden\" name=\"from\" value=\"";
            if (isset($context["from"])) { $_from_ = $context["from"]; } else { $_from_ = null; }
            echo twig_escape_filter($this->env, $_from_, "html", null, true);
            echo "\"/>
                                ";
        }
        // line 59
        echo "                                <div class=\"input-group input-group-lg\">
                                    <span class=\"input-group-addon\"><i class=\"fa fa-user\"></i></span>
                                    <input class=\"form-control\" type=\"text\" placeholder=\"Username\" id=\"username\"
                                           name=\"username\" value=\"\" autocomplete=\"on\" autofocus=\"\">
                                </div>
                                <div class=\"input-group input-group-lg\">
                                    <span class=\"input-group-addon\"><i class=\"fa fa-key\"></i></span>
                                    <input type=\"password\" class=\"form-control\" placeholder=\"Password\" id=\"password\"
                                           name=\"password\">
                                </div>
                                <div class=\"row\">
                                    <div class=\"col-lg-12\">
                                        <button type=\"submit\" class=\"btn btn-success col-xs-12\">Login</button>
                                    </div>
                                    <div class=\"col-lg-12\">
                                        <button style=\"background-color: #cc3732;\" type=\"button\"
                                                class=\"btn btn-danger col-xs-12\"
                                                onclick=\"window.location.href='";
        // line 76
        if (isset($context["googleUrl"])) { $_googleUrl_ = $context["googleUrl"]; } else { $_googleUrl_ = null; }
        echo twig_escape_filter($this->env, $_googleUrl_, "html", null, true);
        echo "'\"><i
                                                    class=\"fa fa-google-plus\"></i> Sign In with Google
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 25
    public function block_content($context, array $blocks = array())
    {
        // line 26
        echo "        ";
    }

    // line 90
    public function block_foot($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@SystemModule/Login/Login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 90,  160 => 26,  157 => 25,  139 => 76,  120 => 59,  113 => 57,  110 => 56,  106 => 54,  99 => 51,  93 => 47,  90 => 46,  69 => 27,  67 => 25,  64 => 24,  61 => 23,  42 => 8,  39 => 7,  34 => 4,  29 => 2,);
    }
}
