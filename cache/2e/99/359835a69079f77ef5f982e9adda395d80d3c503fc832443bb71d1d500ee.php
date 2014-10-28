<?php

/* @Framework/Header.twig */
class __TwigTemplate_2e99359835a69079f77ef5f982e9adda395d80d3c503fc832443bb71d1d500ee extends Twig_Template
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
        echo "<header class=\"navbar\" id=\"header-navbar\">
    <div class=\"container\">
        <a href=\"/\" id=\"logo\" class=\"navbar-brand col-md-3 col-sm-4 col-xs-12\">
            <figure class=\"toolx-logo header\">
                <i class=\"icon-isologo\"></i>
                <span>S2R2</span>
                ";
        // line 8
        echo "            </figure>
        </a>

        <button class=\"navbar-toggle\" data-target=\".navbar-ex1-collapse\" data-toggle=\"collapse\" type=\"button\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"fa fa-bars\"></span>
        </button>

        <div class=\"nav-no-collapse pull-right\" id=\"header-nav\">
            <ul class=\"nav navbar-nav pull-right\">
                <li class=\"hidden-xs\">
                    <a href=\"/system/settings\" class=\"btn\">
                        <i class=\"fa fa-cog\"></i>
                    </a>
                </li>
                <li class=\"dropdown profile-dropdown\">
                    ";
        // line 24
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        if ($_userLogged_) {
            // line 25
            echo "                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            <img src=\"";
            // line 26
            if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_userLogged_, "getProfilePhoto", array(0 => 35), "method"), "html", null, true);
            echo "\" alt=\"\" class=\"img-circle\"/>
                            <span class=\"hidden-xs\">";
            // line 27
            if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_userLogged_, "getName", array(), "method"), "html", null, true);
            echo "</span> <b class=\"caret\"></b>
                        </a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"/system/profile\"><i class=\"fa fa-user\"></i>Profile</a></li>
                            <li><a href=\"/system/settings\"><i class=\"fa fa-cog\"></i>Settings</a></li>
                            <li><a href=\"/system/login/logout\"><i class=\"fa fa-power-off\"></i>Logout</a></li>
                        </ul>
                    ";
        }
        // line 35
        echo "                </li>
                <li class=\"hidden-xxs\">
                    <a class=\"btn\" href=\"/system/login/logout\">
                        <i class=\"fa fa-power-off\"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>";
    }

    public function getTemplateName()
    {
        return "@Framework/Header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 35,  56 => 27,  51 => 26,  48 => 25,  45 => 24,  27 => 8,  19 => 1,);
    }
}
