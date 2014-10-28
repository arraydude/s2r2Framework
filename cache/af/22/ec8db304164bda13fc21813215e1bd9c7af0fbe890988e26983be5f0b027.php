<?php

/* @SystemModule/Roles/Template/Row.twig */
class __TwigTemplate_af22ec8db304164bda13fc21813215e1bd9c7af0fbe890988e26983be5f0b027 extends Twig_Template
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
        if (isset($context["roles"])) { $_roles_ = $context["roles"]; } else { $_roles_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_roles_);
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
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 2
            echo "<tr>
    <td>
        ";
            // line 4
            if (isset($context["level"])) { $_level_ = $context["level"]; } else { $_level_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(0, $_level_));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            if (isset($context["role"])) { $_role_ = $context["role"]; } else { $_role_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_role_, "name"), "html", null, true);
            echo "
    </td>
    <td style=\"width: 20%;\">
        <a href=\"#\" class=\"table-link\" data-show-privileges data-role-id=\"";
            // line 7
            if (isset($context["role"])) { $_role_ = $context["role"]; } else { $_role_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_role_, "role_id"), "html", null, true);
            echo "\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Watch privileges\">
            <span class=\"fa-stack\">
                <i class=\"fa fa-square fa-stack-2x\"></i>
                <i class=\"fa fa-search-plus fa-stack-1x fa-inverse\"></i>
            </span>
        </a>
        ";
            // line 13
            if ($this->env->getExtension('ACL')->hasPrivilege("edit")) {
                // line 14
                echo "        <a href=\"/system/roles/edit?roleId=";
                if (isset($context["role"])) { $_role_ = $context["role"]; } else { $_role_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_role_, "role_id"), "html", null, true);
                echo "\" class=\"table-link\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Edit\">
            <span class=\"fa-stack\">
                <i class=\"fa fa-square fa-stack-2x\"></i>
                <i class=\"fa fa-pencil fa-stack-1x fa-inverse\"></i>
            </span>
        </a>
        ";
            }
            // line 21
            echo "        <a href=\"#\" class=\"table-link red\" data-delete-role data-role-id=\"";
            if (isset($context["role"])) { $_role_ = $context["role"]; } else { $_role_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_role_, "role_id"), "html", null, true);
            echo "\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"Delete\">
            <span class=\"fa-stack\">
                <i class=\"fa fa-square fa-stack-2x\"></i>
                <i class=\"fa fa-trash-o fa-stack-1x fa-inverse\"></i>
            </span>
        </a>
    </td>
</tr>

";
            // line 30
            if (isset($context["role"])) { $_role_ = $context["role"]; } else { $_role_ = null; }
            if (isset($context["level"])) { $_level_ = $context["level"]; } else { $_level_ = null; }
            $this->env->loadTemplate("@SystemModule/Roles/Template/Row.twig")->display(array_merge($context, array("roles" => $this->getAttribute($_role_, "children"), "level" => ($_level_ + 1))));
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@SystemModule/Roles/Template/Row.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 30,  81 => 21,  69 => 14,  67 => 13,  57 => 7,  37 => 2,  19 => 1,  79 => 32,  76 => 31,  68 => 26,  54 => 15,  47 => 11,  44 => 10,  41 => 4,  34 => 6,  31 => 5,  26 => 3,);
    }
}
