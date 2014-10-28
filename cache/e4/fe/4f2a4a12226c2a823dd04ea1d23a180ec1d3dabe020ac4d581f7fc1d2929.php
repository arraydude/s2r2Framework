<?php

/* @SystemModule/Activity/List.twig */
class __TwigTemplate_e4fe4f2a4a12226c2a823dd04ea1d23a180ec1d3dabe020ac4d581f7fc1d2929 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Framework/Base.twig");

        $this->blocks = array(
            'cssResources' => array($this, 'block_cssResources'),
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
        $context["systemModuleActive"] = array("activity" => true);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_cssResources($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->displayParentBlock("cssResources", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("css/libs/daterangepicker.min.css"), "html", null, true);
        echo "\" type=\"text/css\"/>
";
    }

    // line 10
    public function block_jsResources($context, array $blocks = array())
    {
        // line 11
        echo "    <script type=\"text/javascript\">
        Twig.addTemplate('activityElement', ";
        // line 12
        echo $this->env->getExtension('Stringify')->stringifyTwig("/Activity/Template/ActivityElement.twig", "SystemModule");
        echo ");
    </script>
    <script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/libs/moment.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/jquery/daterangepicker.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/fwk/fwk.jquery.pager.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/activity.js"), "html", null, true);
        echo "\"></script>

    <script type=\"text/javascript\">
        var dateFrom = ";
        // line 20
        if (isset($context["dateBetween"])) { $_dateBetween_ = $context["dateBetween"]; } else { $_dateBetween_ = null; }
        echo twig_jsonencode_filter($this->getAttribute($_dateBetween_, "from"));
        echo ";
        var dateTo = ";
        // line 21
        if (isset($context["dateBetween"])) { $_dateBetween_ = $context["dateBetween"]; } else { $_dateBetween_ = null; }
        echo twig_jsonencode_filter($this->getAttribute($_dateBetween_, "to"));
        echo ";
    </script>
";
    }

    // line 25
    public function block_content($context, array $blocks = array())
    {
        // line 26
        echo "    <div class=\"clearfix\">
        <h1 class=\"pull-left\">";
        // line 27
        echo twig_escape_filter($this->env, gettext("Activity"), "html", null, true);
        echo "</h1>
    </div>
    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"main-box clearfix\">
                <div class=\"clearfix\">
                    <form action=\"\" method=\"post\">
                        <div id=\"reportrange\" class=\"pull-right daterange-filter\" style=\"height:34px;\">
                            <i class=\"icon-calendar\"></i>
                            <span></span> <b class=\"caret\"></b>
                        </div>
                        <div class=\"input-group pull-right\" style=\"width: 300px; margin-right: 10px;\">
                            <span class=\"input-group-btn\">
                                <button class=\"btn btn-default\" type=\"button\">Go!</button>
                            </span>
                            <input type=\"text\" placeholder=\"Search a user...\" id=\"search-username\" name=\"search\"
                                   class=\"form-control\" ";
        // line 43
        if (isset($context["search"])) { $_search_ = $context["search"]; } else { $_search_ = null; }
        if ($_search_) {
            echo "value=\"";
            if (isset($context["search"])) { $_search_ = $context["search"]; } else { $_search_ = null; }
            echo twig_escape_filter($this->env, $_search_, "html", null, true);
            echo "\"";
        }
        echo "/>
                        </div>
                    </form>
                </div>
                <div class=\"table-responsive\">
                    <table class=\"table user-list\">
                        <thead>
                        <tr>
                            <th><span>";
        // line 51
        echo twig_escape_filter($this->env, gettext("Type"), "html", null, true);
        echo "</span></th>
                            <th><span>Id</span></th>
                            <th><span>";
        // line 53
        echo twig_escape_filter($this->env, gettext("User"), "html", null, true);
        echo "</span></th>
                            <th><span>";
        // line 54
        echo twig_escape_filter($this->env, gettext("Module"), "html", null, true);
        echo "</span></th>
                            <th><span>";
        // line 55
        echo twig_escape_filter($this->env, gettext("Controller"), "html", null, true);
        echo "</span></th>
                            <th><span>";
        // line 56
        echo twig_escape_filter($this->env, gettext("Action"), "html", null, true);
        echo "</span></th>
                            <th><span>";
        // line 57
        echo twig_escape_filter($this->env, gettext("Date"), "html", null, true);
        echo "</span></th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody id=\"list-activities\">
                        ";
        // line 62
        if (isset($context["activities"])) { $_activities_ = $context["activities"]; } else { $_activities_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_activities_);
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
            // line 63
            echo "                            ";
            $this->env->loadTemplate("@SystemModule/Activity/Template/ActivityElement.twig")->display($context);
            // line 64
            echo "                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "                        </tbody>
                    </table>
                </div>
                <button data-add-more=\"activities\" data-target=\"#list-activities\" data-src=\"system_activity_default\"
                        class=\"btn btn-default btn-large\" style=\"width: 100%;\"><i class=\"fa fa-plus-square\"></i>
                </button>
            </div>
        </div>
    </div>
";
    }

    // line 76
    public function block_javascripts($context, array $blocks = array())
    {
        // line 77
        echo "    \$(\"[data-add-more='activities']\").pager({
        template: Twig.templates.activityElement,
        page: 2,
        extraParams: {
        jsonResponse: true,
            ";
        // line 82
        if (isset($context["dateBetween"])) { $_dateBetween_ = $context["dateBetween"]; } else { $_dateBetween_ = null; }
        if ($_dateBetween_) {
            // line 83
            echo "                dateBetween: {
                from: dateFrom,
                to: dateTo
                },
            ";
        }
        // line 88
        echo "            ";
        if (isset($context["search"])) { $_search_ = $context["search"]; } else { $_search_ = null; }
        if ($_search_) {
            // line 89
            echo "                search: '";
            if (isset($context["search"])) { $_search_ = $context["search"]; } else { $_search_ = null; }
            echo twig_escape_filter($this->env, $_search_, "html", null, true);
            echo "',
            ";
        }
        // line 91
        echo "        },
        callback: function() {
            bindParamsList();
        }
    });
";
    }

    public function getTemplateName()
    {
        return "@SystemModule/Activity/List.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  239 => 91,  232 => 89,  228 => 88,  221 => 83,  218 => 82,  211 => 77,  208 => 76,  195 => 65,  181 => 64,  178 => 63,  160 => 62,  152 => 57,  148 => 56,  144 => 55,  140 => 54,  136 => 53,  131 => 51,  114 => 43,  95 => 27,  92 => 26,  89 => 25,  81 => 21,  76 => 20,  70 => 17,  66 => 16,  62 => 15,  58 => 14,  53 => 12,  50 => 11,  47 => 10,  41 => 7,  36 => 6,  33 => 5,  28 => 3,);
    }
}
