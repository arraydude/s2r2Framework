<?php

/* @SystemModule/Profile/Template/ActivityList.twig */
class __TwigTemplate_bc1c932ed2fef9fdeff99fc58d0aac083068ff91b409a5da3fee5c686873d1a4 extends Twig_Template
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
        echo "<tr>
    <td class=\"text-center\">
    ";
        // line 3
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        if (($this->getAttribute($_element_, "module") == "system")) {
            // line 4
            echo "        <i class=\"fa fa-gears\"></i>
    ";
        } else {
            // line 6
            echo "        <i class=\"fa fa-legal\"></i>
    ";
        }
        // line 8
        echo "    </td>
    <td>
        ";
        // line 10
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_user_, "name"), "html", null, true);
        echo " opened <span class=\"label label-warning\">";
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "controller"), "html", null, true);
        echo "</span> <span class=\"label label-primary\">";
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "action"), "html", null, true);
        echo "</span> action in <a href=\"/";
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "module"), "html", null, true);
        echo "\"><span class=\"label ";
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        if (($this->getAttribute($_element_, "module") == "system")) {
            echo "label-danger";
        } else {
            echo "label-success";
        }
        echo "\">";
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($_element_, "module")), "html", null, true);
        echo "</span></a> module.
    </td>
    <td>
        ";
        // line 13
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "created_date"), "html", null, true);
        echo "
    </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "@SystemModule/Profile/Template/ActivityList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 13,  38 => 10,  34 => 8,  30 => 6,  26 => 4,  23 => 3,  19 => 1,  401 => 187,  390 => 183,  383 => 180,  376 => 177,  368 => 174,  364 => 172,  359 => 171,  335 => 149,  321 => 148,  318 => 147,  300 => 146,  278 => 128,  269 => 121,  259 => 119,  254 => 118,  245 => 111,  235 => 109,  230 => 108,  216 => 98,  204 => 90,  192 => 82,  169 => 63,  163 => 61,  157 => 59,  152 => 58,  143 => 53,  126 => 40,  119 => 37,  110 => 32,  104 => 28,  101 => 27,  95 => 24,  91 => 23,  86 => 21,  83 => 20,  71 => 18,  65 => 17,  60 => 16,  52 => 12,  49 => 11,  46 => 10,  40 => 7,  35 => 6,  32 => 5,  27 => 3,);
    }
}
