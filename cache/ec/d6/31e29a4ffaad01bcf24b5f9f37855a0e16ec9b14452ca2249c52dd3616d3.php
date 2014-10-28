<?php

/* @SystemModule/Roles/List.twig */
class __TwigTemplate_ecd631e29a4ffaad01bcf24b5f9f37855a0e16ec9b14452ca2249c52dd3616d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Framework/Base.twig");

        $this->blocks = array(
            'jsResources' => array($this, 'block_jsResources'),
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
        $context["systemModuleActive"] = array("roles" => true);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_jsResources($context, array $blocks = array())
    {
        // line 6
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/roles.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "<div class=\"clearfix\">
    <h1 class=\"pull-left\">";
        // line 11
        echo twig_escape_filter($this->env, gettext("Roles"), "html", null, true);
        echo "</h1>

    <div class=\"pull-right top-page-ui\">
        <a href=\"/system/roles/new\" class=\"btn btn-primary pull-right\">
            <i class=\"fa fa-plus-circle fa-lg\"></i> ";
        // line 15
        echo twig_escape_filter($this->env, gettext("Add Role"), "html", null, true);
        echo "
        </a>
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
        // line 26
        echo twig_escape_filter($this->env, gettext("Name"), "html", null, true);
        echo "</span></th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 31
        if (isset($context["roles"])) { $_roles_ = $context["roles"]; } else { $_roles_ = null; }
        $this->env->loadTemplate("@SystemModule/Roles/Template/Row.twig")->display(array_merge($context, array("roles" => $_roles_, "level" => 0)));
        // line 32
        echo "                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@SystemModule/Roles/List.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 32,  76 => 31,  68 => 26,  54 => 15,  47 => 11,  44 => 10,  41 => 9,  34 => 6,  31 => 5,  26 => 3,);
    }
}
