<?php

/* @SystemModule/User/Template/UserList.twig */
class __TwigTemplate_9a51afe5e4cf60ad369eaf2159221ef5587f3397cbec926eee41ab488ba7ecf4 extends Twig_Template
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
    <td class=\"truncate-ellipsis\">
        <img src=\"";
        // line 3
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getProfilePhoto($this->getAttribute($_element_, "profile_photo"), $this->getAttribute($_element_, "email"), 45), "html", null, true);
        echo "\" class=\"img-circle\"/>
        <a href=\"/system/profile/?userId=";
        // line 4
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "user_id"), "html", null, true);
        echo "\" class=\"user-link\">";
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "username"), "html", null, true);
        echo "</a>
        <span class=\"user-subhead\">";
        // line 5
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_element_, "role"), "name"), "html", null, true);
        echo "</span>
    </td>
    <td>
        ";
        // line 8
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "created_date"), "html", null, true);
        echo "
    </td>
    <td>
        <a href=\"#\">";
        // line 11
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "email"), "html", null, true);
        echo "</a>
    </td>
    <td>
        ";
        // line 14
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        if (isset($context["userLogged"])) { $_userLogged_ = $context["userLogged"]; } else { $_userLogged_ = null; }
        if (((($this->getAttribute($_element_, "user_id") != $this->getAttribute($_userLogged_, "id")) && $this->env->getExtension('ACL')->hasPrivilege("toggleEnable")) && ($this->getAttribute($_element_, "user_id") != 1))) {
            // line 15
            echo "            <div class=\"onoffswitch onoffswitch-success\">
                <input type=\"checkbox\" class=\"onoffswitch-checkbox\" id=\"switch-";
            // line 16
            if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_element_, "user_id"), "html", null, true);
            echo "\" ";
            if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
            if (($this->getAttribute($_element_, "enabled") == "1")) {
                echo "checked";
            }
            echo " value=\"";
            if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_element_, "user_id"), "html", null, true);
            echo "\">
                <label class=\"onoffswitch-label\" for=\"switch-";
            // line 17
            if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_element_, "user_id"), "html", null, true);
            echo "\">
                    <div class=\"onoffswitch-inner\"></div>
                    <div class=\"onoffswitch-switch\"></div>
                </label>
            </div>
        ";
        }
        // line 23
        echo "    </td>
    <td style=\"width: 20%;\">
        <a href=\"/system/profile/?userId=";
        // line 25
        if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_element_, "user_id"), "html", null, true);
        echo "\" class=\"table-link\">
            <span class=\"fa-stack\">
                <i class=\"fa fa-square fa-stack-2x\"></i>
                <i class=\"fa fa-search-plus fa-stack-1x fa-inverse\"></i>
            </span>
        </a>
        ";
        // line 31
        if ($this->env->getExtension('ACL')->hasPrivilege("register_edit")) {
            // line 32
            echo "            <a href=\"/system/register/edit/?userId=";
            if (isset($context["element"])) { $_element_ = $context["element"]; } else { $_element_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_element_, "user_id"), "html", null, true);
            echo "\" class=\"table-link\">
                <span class=\"fa-stack\">
                    <i class=\"fa fa-square fa-stack-2x\"></i>
                    <i class=\"fa fa-pencil fa-stack-1x fa-inverse\"></i>
                </span>
            </a>
        ";
        }
        // line 39
        echo "    </td>
</tr>";
    }

    public function getTemplateName()
    {
        return "@SystemModule/User/Template/UserList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 39,  103 => 32,  101 => 31,  91 => 25,  87 => 23,  77 => 17,  64 => 16,  61 => 15,  57 => 14,  50 => 11,  43 => 8,  36 => 5,  28 => 4,  23 => 3,  19 => 1,);
    }
}
