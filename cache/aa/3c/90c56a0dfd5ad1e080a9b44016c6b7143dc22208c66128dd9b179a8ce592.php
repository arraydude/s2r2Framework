<?php

/* @Framework/Base.twig */
class __TwigTemplate_aa3c90c56a0dfd5ad1e080a9b44016c6b7143dc22208c66128dd9b179a8ce592 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'cssResources' => array($this, 'block_cssResources'),
            'head' => array($this, 'block_head'),
            'container' => array($this, 'block_container'),
            'content' => array($this, 'block_content'),
            'foot' => array($this, 'block_foot'),
            'jsResources' => array($this, 'block_jsResources'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\" />
        <meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\" />

        <title>R2S2 Framework</title>

        <link rel=\"shortcut icon\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("favicon.ico", "system"), "html", null, true);
        echo "\" type=\"image/x-icon\" />
        <link rel=\"stylesheet/less\" type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("less/base.less", "System"), "html", null, true);
        echo "\" />

        <!-- google font libraries -->
        ";
        // line 16
        echo "        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css' />

        <!--[if lt IE 9]>
                <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/libs/html5shiv.js", "System"), "html", null, true);
        echo "\"></script>
                <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/libs/respond.min.js", "System"), "html", null, true);
        echo "\"></script>
        <![endif]-->
        <!--[if lt IE 8]>
                <link href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("css/libs/font-awesome-ie7.min.css", "System"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        <![endif]-->

        ";
        // line 26
        $this->displayBlock('cssResources', $context, $blocks);
        // line 29
        echo "
        ";
        // line 31
        echo "        <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/libs/less.js", "System"), "html", null, true);
        echo "\"></script>

        <!-- Jira Issue Colector -->
        ";
        // line 34
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        if ($_userLogged_) {
            // line 35
            echo "            <script type=\"text/javascript\" async src=\"https://jira.olx.com/s/d41d8cd98f00b204e9800998ecf8427e/en_US-vwehv3-1988229788/6265/21/1.4.7/_/download/batch/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector.js?collectorId=7dc16821\">
            </script>
        ";
        }
        // line 38
        echo "        <!-- End - Jira Issue Colector -->

    </head>
    <body id=\"";
        // line 41
        if (isset($context["idBody"])) { $_idBody_ = $context["idBody"]; } else { $_idBody_ = null; }
        echo twig_escape_filter($this->env, $_idBody_, "html", null, true);
        echo "\" class=\"fade-in\">
        ";
        // line 42
        $this->displayBlock('head', $context, $blocks);
        // line 45
        echo "
        <div class=\"container\">
            ";
        // line 47
        $this->displayBlock('container', $context, $blocks);
        // line 133
        echo "        </div>

        ";
        // line 135
        $this->displayBlock('foot', $context, $blocks);
        // line 138
        echo "
        <!-- global scripts -->
        <script src=\"";
        // line 140
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/jquery/jquery.js", "System"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 141
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/jquery/jquery-ui.custom.min.js", "System"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 142
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/bootstrap/bootstrap.min.js", "System"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 143
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/bootstrap/bootbox.min.js", "System"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 144
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/jquery/jquery.slimscroll.min.js", "System"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 145
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/libs/moment.min.js", "System"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/fwk/fwk.jquery.toastNotifications.min.js", "System"), "html", null, true);
        echo "\" async></script>

        <script src=\"";
        // line 148
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/libs/md5.min.js", "System"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 149
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/libs/twig/twig.min.js", "System"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 150
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/libs/twig/twigExtensions.js", "System"), "html", null, true);
        echo "\"></script>

        <script src=\"/system/default/globalsjs/\" type=\"text/javascript\"></script>

        <!-- theme scripts -->
        <script src=\"";
        // line 155
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/scripts.min.js", "System"), "html", null, true);
        echo "\"></script>

        <!-- sToolx -->
        <script src=\"";
        // line 158
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/libs/sToolx.js", "System"), "html", null, true);
        echo "\"></script>

        ";
        // line 160
        $this->displayBlock('jsResources', $context, $blocks);
        // line 162
        echo "
        <script type=\"text/javascript\">
            \$(function() {
                ";
        // line 165
        $this->displayBlock('javascripts', $context, $blocks);
        // line 167
        echo "            });
        </script>
    </body>
</html>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 26
    public function block_cssResources($context, array $blocks = array())
    {
        // line 27
        echo "            <link rel=\"stylesheet/less\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("less/kernel.less", "System"), "html", null, true);
        echo "\"/>
        ";
    }

    // line 42
    public function block_head($context, array $blocks = array())
    {
        // line 43
        echo "            ";
        $this->env->loadTemplate("@Framework/Header.twig")->display($context);
        // line 44
        echo "        ";
    }

    // line 47
    public function block_container($context, array $blocks = array())
    {
        // line 48
        echo "                <div class=\"row\">
                    <div class=\"col-md-2 col-sm-12\" id=\"nav-col\">
                        <section id=\"col-left\">
                            <div class=\"collapse navbar-collapse navbar-ex1-collapse\" id=\"sidebar-nav\">
                                <ul class=\"nav nav-pills nav-stacked\">
                                    <li ";
        // line 53
        if (isset($context["systemModuleActive"])) { $_systemModuleActive_ = $context["systemModuleActive"]; } else { $_systemModuleActive_ = null; }
        if ($this->getAttribute($_systemModuleActive_, "dashboard", array(), "array")) {
            echo " class=\"active\" ";
        }
        echo ">
                                        <a href=\"";
        // line 54
        if (isset($context["configs"])) { $_configs_ = $context["configs"]; } else { $_configs_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_configs_, "framework"), "base_url"), "html", null, true);
        echo "\">
                                            <i class=\"fa fa-dashboard\"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    ";
        // line 59
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        if (twig_in_filter("system", $this->getAttribute($_userLogged_, "getModules", array(), "method"))) {
            // line 60
            echo "                                        <li ";
            if (isset($context["systemModuleActive"])) { $_systemModuleActive_ = $context["systemModuleActive"]; } else { $_systemModuleActive_ = null; }
            if ($this->getAttribute($_systemModuleActive_, "users", array(), "array")) {
                echo " class=\"open active\" ";
            }
            echo ">
                                            <a href=\"#\" class=\"dropdown-toggle\">
                                                <i class=\"fa fa-users\"></i>
                                                <span>Users</span>
                                                <i class=\"fa fa-chevron-circle-down drop-icon\"></i>
                                            </a>
                                            <ul class=\"submenu\" ";
            // line 66
            if (isset($context["systemModuleActive"])) { $_systemModuleActive_ = $context["systemModuleActive"]; } else { $_systemModuleActive_ = null; }
            if ($this->getAttribute($_systemModuleActive_, "users", array(), "array")) {
                echo " style=\"display:block;\" ";
            }
            echo ">
                                                <li>
                                                    <a href=\"/system/register\">
                                                        ";
            // line 69
            echo twig_escape_filter($this->env, gettext("New"), "html", null, true);
            echo "
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=\"/system/user/list\">
                                                        ";
            // line 74
            echo twig_escape_filter($this->env, gettext("List"), "html", null, true);
            echo "
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=\"/system/profile\">
                                                        ";
            // line 79
            echo twig_escape_filter($this->env, gettext("Profile"), "html", null, true);
            echo "
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li ";
            // line 84
            if (isset($context["systemModuleActive"])) { $_systemModuleActive_ = $context["systemModuleActive"]; } else { $_systemModuleActive_ = null; }
            if ($this->getAttribute($_systemModuleActive_, "roles", array(), "array")) {
                echo " class=\"open active\" ";
            }
            echo ">
                                            <a href=\"#\" class=\"dropdown-toggle\">
                                                <i class=\"fa fa-key\"></i>
                                                <span>Roles</span>
                                                <i class=\"fa fa-chevron-circle-down drop-icon\"></i>
                                            </a>
                                            <ul class=\"submenu\" ";
            // line 90
            if (isset($context["systemModuleActive"])) { $_systemModuleActive_ = $context["systemModuleActive"]; } else { $_systemModuleActive_ = null; }
            if ($this->getAttribute($_systemModuleActive_, "roles", array(), "array")) {
                echo "style=\"display:block\"";
            }
            echo ">
                                                <li>
                                                    <a href=\"/system/roles/new\">
                                                        ";
            // line 93
            echo twig_escape_filter($this->env, gettext("New"), "html", null, true);
            echo "
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href=\"/system/roles/list\">
                                                        ";
            // line 98
            echo twig_escape_filter($this->env, gettext("List"), "html", null, true);
            echo "
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        ";
            // line 103
            if ($this->env->getExtension('ACL')->hasPrivilege("system_activity_default")) {
                // line 104
                echo "                                            <li ";
                if (isset($context["systemModuleActive"])) { $_systemModuleActive_ = $context["systemModuleActive"]; } else { $_systemModuleActive_ = null; }
                if ($this->getAttribute($_systemModuleActive_, "activity", array(), "array")) {
                    echo " class=\"active\" ";
                }
                echo ">
                                                <a href=\"/system/activity\">
                                                    <i class=\"fa fa-calendar\"></i>
                                                    <span>";
                // line 107
                echo twig_escape_filter($this->env, gettext("Activity"), "html", null, true);
                echo "</span>
                                                </a>
                                            </li>
                                        ";
            }
            // line 111
            echo "                                    ";
        }
        // line 112
        echo "
                                    ";
        // line 113
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_userLogged_, "getModules", array(), "method"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
            if (($_module_ != "system")) {
                // line 114
                echo "                                        ";
                if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
                if ((twig_lower_filter($this->env, $this->getAttribute(call_user_func_array($this->env->getFunction('getComponents')->getCallable(), array()), "module")) == twig_lower_filter($this->env, $_module_))) {
                    // line 115
                    echo "                                            ";
                    $context["moduleActive"] = true;
                    // line 116
                    echo "                                        ";
                } else {
                    // line 117
                    echo "                                            ";
                    $context["moduleActive"] = false;
                    // line 118
                    echo "                                        ";
                }
                // line 119
                echo "                                        <li ";
                if (isset($context["moduleActive"])) { $_moduleActive_ = $context["moduleActive"]; } else { $_moduleActive_ = null; }
                if ($_moduleActive_) {
                    echo "class=\"active open\"";
                }
                echo ">
                                            ";
                // line 120
                if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
                if (isset($context["moduleActive"])) { $_moduleActive_ = $context["moduleActive"]; } else { $_moduleActive_ = null; }
                $template = $this->env->resolveTemplate((("@" . twig_capitalize_string_filter($this->env, $_module_)) . "Module/menu.twig"));
                $template->display(array_merge($context, array("moduleActive" => $_moduleActive_)));
                // line 121
                echo "                                        </li>
                                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 123
        echo "                                </ul>
                            </div>
                        </section>
                    </div>
                    <div class=\"col-md-10 col-sm-12\" id=\"content-wrapper\">
                        ";
        // line 128
        $this->displayBlock('content', $context, $blocks);
        // line 130
        echo "                    </div>
                </div>
            ";
    }

    // line 128
    public function block_content($context, array $blocks = array())
    {
        // line 129
        echo "                        ";
    }

    // line 135
    public function block_foot($context, array $blocks = array())
    {
        // line 136
        echo "            ";
        // line 137
        echo "        ";
    }

    // line 160
    public function block_jsResources($context, array $blocks = array())
    {
        // line 161
        echo "        ";
    }

    // line 165
    public function block_javascripts($context, array $blocks = array())
    {
        // line 166
        echo "                ";
    }

    public function getTemplateName()
    {
        return "@Framework/Base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  443 => 166,  440 => 165,  436 => 161,  433 => 160,  429 => 137,  427 => 136,  424 => 135,  420 => 129,  417 => 128,  411 => 130,  409 => 128,  402 => 123,  391 => 121,  386 => 120,  378 => 119,  375 => 118,  369 => 116,  366 => 115,  362 => 114,  349 => 113,  346 => 112,  343 => 111,  336 => 107,  326 => 104,  324 => 103,  316 => 98,  308 => 93,  299 => 90,  287 => 84,  279 => 79,  263 => 69,  254 => 66,  241 => 60,  238 => 59,  229 => 54,  222 => 53,  215 => 48,  212 => 47,  208 => 44,  205 => 43,  202 => 42,  195 => 27,  192 => 26,  183 => 167,  181 => 165,  176 => 162,  174 => 160,  169 => 158,  155 => 150,  151 => 149,  147 => 148,  142 => 146,  138 => 145,  130 => 143,  126 => 142,  122 => 141,  118 => 140,  112 => 135,  108 => 133,  106 => 47,  102 => 45,  100 => 42,  95 => 41,  85 => 35,  82 => 34,  70 => 26,  64 => 23,  58 => 20,  54 => 19,  43 => 12,  39 => 11,  28 => 2,  26 => 1,  372 => 117,  361 => 175,  354 => 172,  347 => 169,  339 => 166,  335 => 164,  330 => 163,  306 => 141,  292 => 140,  289 => 139,  271 => 74,  249 => 120,  240 => 113,  230 => 111,  225 => 110,  216 => 103,  206 => 101,  201 => 100,  187 => 90,  175 => 82,  163 => 155,  140 => 55,  134 => 144,  128 => 51,  123 => 50,  114 => 138,  97 => 32,  90 => 38,  81 => 24,  75 => 31,  72 => 29,  66 => 16,  62 => 15,  57 => 13,  52 => 12,  49 => 16,  46 => 10,  40 => 7,  35 => 6,  32 => 5,  27 => 3,);
    }
}
