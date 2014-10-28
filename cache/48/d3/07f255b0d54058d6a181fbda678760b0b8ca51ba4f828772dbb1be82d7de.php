<?php

/* @SystemModule/Settings/Settings.twig */
class __TwigTemplate_48d307f255b0d54058d6a181fbda678760b0b8ca51ba4f828772dbb1be82d7de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Framework/Base.twig");

        $this->blocks = array(
            'jsResources' => array($this, 'block_jsResources'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Framework/Base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["systemModuleActive"] = array("users" => true);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_jsResources($context, array $blocks = array())
    {
        // line 6
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/libs/md5.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/jquery/validator.min.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "     
    <h1>Settings</h1>
    <div class=\"main-box\">
        <h2>";
        // line 14
        echo twig_escape_filter($this->env, gettext("Basic Data"), "html", null, true);
        echo "</h2>
        <form action=\"/system/settings/save\" method=\"post\" name=\"settings\" data-toggle=\"validator\">
            <div class=\"form-group\">
                <label for=\"email\">";
        // line 17
        echo twig_escape_filter($this->env, gettext("Email"), "html", null, true);
        echo ":</label>
                <input type=\"email\" disabled value=\"";
        // line 18
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_userLogged_, "email"), "html", null, true);
        echo "\" class=\"form-control\" />
            </div>

            <div class=\"form-group\">
                <label for=\"username\">";
        // line 22
        echo twig_escape_filter($this->env, gettext("Username"), "html", null, true);
        echo ":</label>
                <input type=\"text\" placeholder=\"\" disabled value=\"";
        // line 23
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_userLogged_, "username"), "html", null, true);
        echo "\" autocomplete=\"on\" class=\"form-control\" />
            </div>

            <div class=\"form-group\">
                <label for=\"name\">";
        // line 27
        echo twig_escape_filter($this->env, gettext("Full Name"), "html", null, true);
        echo ":</label>
                <input type=\"text\" placeholder=\"\" id=\"name\" name=\"name\" value=\"";
        // line 28
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_userLogged_, "name"), "html", null, true);
        echo "\" autocomplete=\"on\" class=\"form-control\" />
            </div>

            <div class=\"form-group\">
                <label for=\"referer_email\">";
        // line 32
        echo twig_escape_filter($this->env, gettext("Referer email"), "html", null, true);
        echo ":</label>
                <input type=\"email\" placeholder=\"\" id=\"referer_email\" name=\"referer_email\" value=\"";
        // line 33
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_userLogged_, "refererEmail"), "html", null, true);
        echo "\" autocomplete=\"on\" class=\"form-control\" />
            </div>

            <div class=\"form-group\">
                <label for=\"language\">";
        // line 37
        echo twig_escape_filter($this->env, gettext("Admin Language"), "html", null, true);
        echo ":</label>
                <select name=\"language_id\" id=\"language\" class=\"form-control\">
                    ";
        // line 39
        if (isset($context["languages"])) { $_languages_ = $context["languages"]; } else { $_languages_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_languages_);
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 40
            echo "                        <option ";
            if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
            if (isset($context["language"])) { $_language_ = $context["language"]; } else { $_language_ = null; }
            if (($this->getAttribute($_userLogged_, "languageId") == $this->getAttribute($_language_, "language_id"))) {
                echo "selected";
            }
            echo " value=\"";
            if (isset($context["language"])) { $_language_ = $context["language"]; } else { $_language_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_language_, "language_id"), "html", null, true);
            echo "\">";
            if (isset($context["language"])) { $_language_ = $context["language"]; } else { $_language_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_language_, "name"), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "                </select>
            </div>
                
            <div class=\"form-group clearfix\">
                <figure class=\"pull-left\" style=\"margin-right: 10px;\">
                    <img id=\"gravatarThumb\" src=\"";
        // line 47
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateGravatar($this->getAttribute($_userLogged_, "getGravatarAccount", array(), "method")), "html", null, true);
        echo "\"/>
                </figure>
                <span>
                    <a href=\"http://gravatar.com\" target=\"_blank\">
                        <label for=\"username\" style=\"cursor:pointer;\">";
        // line 51
        echo twig_escape_filter($this->env, gettext("Gravatar account"), "html", null, true);
        echo ":</label>
                    </a>
                    <input type=\"email\" placeholder=\"";
        // line 53
        echo twig_escape_filter($this->env, gettext("Gravatar email"), "html", null, true);
        echo "\" name=\"gravatar\" id=\"gravatar\" value=\"";
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_userLogged_, "getGravatarAccount", array(), "method"), "html", null, true);
        echo "\" autocomplete=\"on\" class=\"form-control\" style=\"width:300px\"/>
                </span>
            </div>

            <input type=\"submit\" value=\"";
        // line 57
        echo twig_escape_filter($this->env, gettext("Save"), "html", null, true);
        echo "\" class=\"btn btn-success\" />
        </form>

        ";
        // line 60
        if (isset($context["error"])) { $_error_ = $context["error"]; } else { $_error_ = null; }
        if ($_error_) {
            // line 61
            echo "            <span class=\"error\">";
            if (isset($context["error"])) { $_error_ = $context["error"]; } else { $_error_ = null; }
            echo twig_escape_filter($this->env, $_error_, "html", null, true);
            echo "</span>
        ";
        }
        // line 63
        echo "    </div>
    <div class=\"main-box\">
        <h2>";
        // line 65
        echo twig_escape_filter($this->env, gettext("Change Password"), "html", null, true);
        echo "</h2>
        <form action=\"/system/settings/changePassword\" method=\"post\" id=\"changePassword\" data-toggle=\"validator\">
            <div class=\"form-group\">
                <label for=\"password\">";
        // line 68
        echo twig_escape_filter($this->env, gettext("New Password"), "html", null, true);
        echo ":</label>
                <input type=\"password\" id=\"password\" name=\"password\" value=\"\" class=\"form-control\" required />
            </div>

            <div class=\"form-group\">
                <label for=\"password\">";
        // line 73
        echo twig_escape_filter($this->env, gettext("Confirm Password"), "html", null, true);
        echo ":</label>
                <input type=\"password\" id=\"password_confirm\" name=\"password_repetition\" value=\"\" class=\"form-control\" required data-match=\"#password\" data-match-error=\"";
        // line 74
        echo twig_escape_filter($this->env, gettext("Password mismatch"), "html", null, true);
        echo "\" />
                <div class=\"help-block with-errors\"></div>
            </div>

            <input type=\"submit\" value=\"";
        // line 78
        echo twig_escape_filter($this->env, gettext("Save"), "html", null, true);
        echo "\" class=\"btn btn-success\" />
        </form>
    </div>
";
    }

    // line 83
    public function block_javascripts($context, array $blocks = array())
    {
        // line 84
        echo "    \$(\"input[name='gravatar']\").on('keyup', function() {
        var mail = \$(this).val();
        \$('#gravatarThumb').attr('src', gravatarUrl(mail));
    });
";
    }

    public function getTemplateName()
    {
        return "@SystemModule/Settings/Settings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 84,  220 => 83,  212 => 78,  205 => 74,  201 => 73,  193 => 68,  187 => 65,  183 => 63,  176 => 61,  173 => 60,  167 => 57,  157 => 53,  152 => 51,  144 => 47,  137 => 42,  118 => 40,  113 => 39,  108 => 37,  100 => 33,  96 => 32,  88 => 28,  84 => 27,  76 => 23,  72 => 22,  64 => 18,  60 => 17,  54 => 14,  49 => 11,  46 => 10,  40 => 7,  35 => 6,  32 => 5,  27 => 3,);
    }
}
