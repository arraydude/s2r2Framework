<?php

/* @SystemModule/Dashboard/Dashboard.twig */
class __TwigTemplate_b5dd0f075137da8e83b5024f3dce1426c0f3e75832482f6c196b0b254113191c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Framework/Base.twig");

        $this->blocks = array(
            'cssResources' => array($this, 'block_cssResources'),
            'container' => array($this, 'block_container'),
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
        $context["idBody"] = "";
        // line 4
        $context["systemModuleActive"] = array("dashboard" => true);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_cssResources($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        $this->displayParentBlock("cssResources", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("css/dashboard.css"), "html", null, true);
        echo "\"/>
";
    }

    // line 11
    public function block_container($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"row\">
        <h1>Dashboard</h1>
        ";
        // line 14
        $this->displayBlock('content', $context, $blocks);
        // line 16
        echo "        <div id=\"dashboard\" class=\"container\">
            ";
        // line 17
        if (isset($context["modules"])) { $_modules_ = $context["modules"]; } else { $_modules_ = null; }
        if (twig_in_filter("system", $_modules_)) {
            // line 18
            echo "                <div class=\"module\">
                    <a href=\"/system/user/list\" class=\"menu dropdown-toggle\">
                        <i class=\"fa fa-users\"></i>
                        <span>Users</span>
                    </a>
                </div>
                <div class=\"module\">
                    <a href=\"/system/roles/list\" class=\"menu dropdown-toggle\">
                        <i class=\"fa fa-key\"></i>
                        <span>Roles</span>
                    </a>
                </div>
                ";
            // line 30
            if ($this->env->getExtension('ACL')->hasPrivilege("system_activity_default")) {
                // line 31
                echo "                    <div class=\"module\">
                        <a href=\"/system/activity\" class=\"menu dropdown-toggle\">
                            <i class=\"fa fa-calendar\"></i>
                            <span>Activity</span>
                        </a>
                    </div>
                ";
            }
            // line 38
            echo "            ";
        }
        // line 39
        echo "            ";
        if (isset($context["modules"])) { $_modules_ = $context["modules"]; } else { $_modules_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_modules_);
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
            if ((twig_lower_filter($this->env, $_module_) != "system")) {
                // line 40
                echo "                <div class=\"module\">
                    ";
                // line 41
                if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
                $template = $this->env->resolveTemplate((("@" . twig_capitalize_string_filter($this->env, $_module_)) . "Module/menu.twig"));
                $template->display(array_merge($context, array("moduleActive" => false)));
                // line 42
                echo "                </div>
            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "        </div>
    </div>
";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "        ";
    }

    // line 48
    public function block_javascripts($context, array $blocks = array())
    {
        // line 49
        echo "    ";
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        if (isset($context["modules"])) { $_modules_ = $context["modules"]; } else { $_modules_ = null; }
        if (((twig_length_filter($this->env, $this->getAttribute($_userLogged_, "getModules", array(), "method")) < 4) && !twig_in_filter("system", $_modules_))) {
            // line 50
            echo "        \$(\"#dashboard\").css('width', '170px');
    ";
        }
        // line 52
        echo "    \$(\"button.navbar-toggle\").hide();
";
    }

    public function getTemplateName()
    {
        return "@SystemModule/Dashboard/Dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 52,  145 => 50,  140 => 49,  137 => 48,  133 => 15,  130 => 14,  124 => 44,  113 => 42,  109 => 41,  106 => 40,  92 => 39,  89 => 38,  80 => 31,  78 => 30,  64 => 18,  61 => 17,  58 => 16,  56 => 14,  52 => 12,  49 => 11,  43 => 8,  38 => 7,  35 => 6,  30 => 4,  28 => 3,);
    }
}
