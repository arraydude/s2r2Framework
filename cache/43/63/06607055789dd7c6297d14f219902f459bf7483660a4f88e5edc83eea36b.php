<?php

/* @SystemModule/Activity/Template/ActivityElement.twig */
class __TwigTemplate_436306607055789dd7c6297d14f219902f459bf7483660a4f88e5edc83eea36b extends Twig_Template
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
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        if (("changePassword" == $this->getAttribute($_element_, "action"))) {
            // line 2
            echo "    ";
            $context["debugParams"] = "*****";
        } else {
            // line 4
            echo "    ";
            if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
            $context["debugParams"] = $this->getAttribute($_element_, "params");
        }
        // line 6
        echo "
<tr data-activity-params=";
        // line 7
        if (isset($context["debugParams"])) { $_debugParams_ = $context["debugParams"]; } else { $_debugParams_ = null; }
        echo twig_escape_filter($this->env, $_debugParams_, "html", null, true);
        echo ">
    <td class=\"text-left\">
        ";
        // line 9
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        if (($this->getAttribute($_element_, "module") == "system")) {
            // line 10
            echo "            <i class=\"fa fa-gears\"></i>
        ";
        } else {
            // line 12
            echo "            <i class=\"fa fa-legal\"></i>
        ";
        }
        // line 14
        echo "    </td>
    <td>";
        // line 15
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "log_id"), "html", null, true);
        echo "</td>
    <td class=\"truncate-ellipsis\">
        <img src=\"";
        // line 17
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getProfilePhoto($this->getAttribute($_element_, "profile_photo"), $this->getAttribute($_element_, "user_email"), 45), "html", null, true);
        echo "\" class=\"img-circle\" />
        <a href=\"/system/profile/?userId=";
        // line 18
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "user_id"), "html", null, true);
        echo "\" class=\"user-link\">";
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "user_name"), "html", null, true);
        echo "</a>
        <span class=\"user-subhead\">";
        // line 19
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "user_email"), "html", null, true);
        echo "</span>
    </td>
    <td>";
        // line 21
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "module"), "html", null, true);
        echo "</td>
    <td>";
        // line 22
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "controller"), "html", null, true);
        echo "</td>
    <td>";
        // line 23
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "action"), "html", null, true);
        echo "</td>
    <td>";
        // line 24
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "created_date"), "html", null, true);
        echo "</td>
    <td>
        <a href=\"#\" class=\"table-link\" data-show-params data-toggle=\"tooltip\" data-title=\"Show Params\" title=\"Show Params\">
            <span class=\"fa-stack\">
                <i class=\"fa fa-square fa-stack-2x\"></i>
                <i class=\"fa fa-search-plus fa-stack-1x fa-inverse\"></i>
            </span>
        </a>
    </td>
</tr>";
    }

    public function getTemplateName()
    {
        return "@SystemModule/Activity/Template/ActivityElement.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 24,  84 => 22,  79 => 21,  73 => 19,  65 => 18,  60 => 17,  54 => 15,  51 => 14,  43 => 10,  40 => 9,  34 => 7,  31 => 6,  26 => 4,  22 => 2,  19 => 1,  239 => 91,  232 => 89,  228 => 88,  221 => 83,  218 => 82,  211 => 77,  208 => 76,  195 => 65,  181 => 64,  178 => 63,  160 => 62,  152 => 57,  148 => 56,  144 => 55,  140 => 54,  136 => 53,  131 => 51,  114 => 43,  95 => 27,  92 => 26,  89 => 23,  81 => 21,  76 => 20,  70 => 17,  66 => 16,  62 => 15,  58 => 14,  53 => 12,  50 => 11,  47 => 12,  41 => 7,  36 => 6,  33 => 5,  28 => 3,);
    }
}
