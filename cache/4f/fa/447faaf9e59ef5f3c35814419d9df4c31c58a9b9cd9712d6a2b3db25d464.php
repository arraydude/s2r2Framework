<?php

/* @SystemModule/User/List.twig */
class __TwigTemplate_4ffa447faaf9e59ef5f3c35814419d9df4c31c58a9b9cd9712d6a2b3db25d464 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Framework/Base.twig");

        $this->blocks = array(
            'jsResources' => array($this, 'block_jsResources'),
            'cssResources' => array($this, 'block_cssResources'),
            'content' => array($this, 'block_content'),
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
        echo "    <script type=\"text/javascript\">
        Twig.addTemplate('userList', ";
        // line 7
        echo $this->env->getExtension('Stringify')->stringifyTwig("/User/Template/UserList.twig", "SystemModule");
        echo ");
    </script>
    <script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/fwk/fwk.jquery.pager.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/users_list.js"), "html", null, true);
        echo "\" async></script>
";
    }

    // line 13
    public function block_cssResources($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        $this->displayParentBlock("cssResources", $context, $blocks);
        echo "
    <style type=\"text/css\">
        .onoffswitch-inner:before {
            content: \"";
        // line 17
        echo twig_escape_filter($this->env, gettext("YES"), "html", null, true);
        echo "\";
        }
        .onoffswitch-inner:after {
            content: \"";
        // line 20
        echo twig_escape_filter($this->env, gettext("NO"), "html", null, true);
        echo "\";
        }
    </style>
";
    }

    // line 25
    public function block_content($context, array $blocks = array())
    {
        // line 26
        echo "    <div class=\"clearfix\">
        <h1 class=\"pull-left\">";
        // line 27
        echo twig_escape_filter($this->env, gettext("Users"), "html", null, true);
        echo "</h1>

        <div class=\"pull-right top-page-ui\">
            <a href=\"/system/register\" class=\"btn btn-primary pull-right\">
                <i class=\"fa fa-plus-circle fa-lg\"></i> ";
        // line 31
        echo twig_escape_filter($this->env, gettext("Add User"), "html", null, true);
        echo "
            </a>
        </div>
        <div class=\"pull-right top-page-ui form-group col-md-3\">
            <div class=\"input-group\">
                <span class=\"input-group-addon\"><i class=\"fa fa-search\"></i></span>
                <form role=\"search\" action=\"/system/user/list\" method=\"get\">
                    <input id=\"search-user\" name=\"search\" value=\"";
        // line 38
        if (isset($context["search"])) { $_search_ = $context["search"]; } else { $_search_ = null; }
        echo twig_escape_filter($this->env, $_search_, "html", null, true);
        echo "\" type=\"text\" class=\"form-control\" placeholder=\"Search Username or Email\" onclick=\"this.select()\" />
                </form>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"main-box clearfix\">
                <div class=\"table-responsive\">
                    <table class=\"table user-list\">
                        <thead>
                            <tr>
                                <th><span>";
        // line 50
        echo twig_escape_filter($this->env, gettext("User"), "html", null, true);
        echo "</span></th>
                                <th><span>";
        // line 51
        echo twig_escape_filter($this->env, gettext("Created"), "html", null, true);
        echo "</span></th>
                                <th><span>";
        // line 52
        echo twig_escape_filter($this->env, gettext("Email"), "html", null, true);
        echo "</span></th>
                                <th><span>";
        // line 53
        echo twig_escape_filter($this->env, gettext("Enabled"), "html", null, true);
        echo "</span></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody data-users-list>
                            ";
        // line 58
        if (isset($context["users"])) { $_users_ = $context["users"]; } else { $_users_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_users_);
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
            if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
            if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
            if ((($this->getAttribute($_element_, "user_id") != 1) || ($this->getAttribute($_element_, "user_id") == $this->getAttribute($_userLogged_, "id")))) {
                // line 59
                echo "                                ";
                $this->env->loadTemplate("@SystemModule/User/Template/UserList.twig")->display($context);
                // line 60
                echo "                            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "                        </tbody>
                    </table>
                    
                    <button data-add-more=\"users\" class=\"btn btn-default btn-large\" data-target=\"table.table [data-users-list]\" data-src=\"system_user_list\" style=\"width: 100%;\"><i class=\"fa fa-plus-square\"></i></button>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@SystemModule/User/List.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 61,  153 => 60,  150 => 59,  136 => 58,  128 => 53,  124 => 52,  120 => 51,  116 => 50,  100 => 38,  90 => 31,  83 => 27,  80 => 26,  77 => 25,  69 => 20,  63 => 17,  56 => 14,  53 => 13,  47 => 10,  43 => 9,  38 => 7,  35 => 6,  32 => 5,  27 => 3,);
    }
}
