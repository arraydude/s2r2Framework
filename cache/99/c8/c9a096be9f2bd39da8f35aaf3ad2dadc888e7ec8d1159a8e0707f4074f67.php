<?php

/* @SystemModule/User/Template/RoleTree.twig */
class __TwigTemplate_99c8c9a096be9f2bd39da8f35aaf3ad2dadc888e7ec8d1159a8e0707f4074f67 extends Twig_Template
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
            echo "    <option ";
            if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
            if (isset($context["role"])) { $_role_ = $context["role"]; } else { $_role_ = null; }
            if (($this->getAttribute($_userData_, "role_id") == $this->getAttribute($_role_, "role_id"))) {
                echo "selected";
            }
            echo " value=\"";
            if (isset($context["role"])) { $_role_ = $context["role"]; } else { $_role_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_role_, "role_id"), "html", null, true);
            echo "\">
        ";
            // line 3
            if (isset($context["level"])) { $_level_ = $context["level"]; } else { $_level_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(0, $_level_));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                echo "&nbsp;&nbsp;&nbsp;";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "&#x251c;&#x2500;
        ";
            // line 4
            if (isset($context["role"])) { $_role_ = $context["role"]; } else { $_role_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_role_, "name"), "html", null, true);
            echo "
    </option>

    ";
            // line 7
            if (isset($context["role"])) { $_role_ = $context["role"]; } else { $_role_ = null; }
            if (isset($context["level"])) { $_level_ = $context["level"]; } else { $_level_ = null; }
            if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
            $this->env->loadTemplate("@SystemModule/User/Template/RoleTree.twig")->display(array_merge($context, array("roles" => $this->getAttribute($_role_, "children"), "level" => ($_level_ + 1), "userData" => $_userData_)));
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
        return "@SystemModule/User/Template/RoleTree.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 7,  61 => 4,  49 => 3,  37 => 2,  19 => 1,  557 => 186,  547 => 184,  541 => 183,  537 => 181,  534 => 180,  525 => 173,  522 => 172,  510 => 163,  504 => 159,  483 => 151,  475 => 148,  462 => 145,  444 => 144,  440 => 143,  435 => 142,  432 => 141,  427 => 140,  415 => 138,  398 => 137,  395 => 136,  390 => 135,  381 => 133,  370 => 132,  362 => 128,  353 => 123,  348 => 122,  342 => 118,  324 => 117,  316 => 115,  308 => 109,  304 => 108,  300 => 107,  294 => 104,  286 => 98,  267 => 96,  262 => 95,  257 => 93,  251 => 89,  232 => 87,  227 => 86,  222 => 84,  216 => 80,  197 => 78,  192 => 77,  187 => 75,  179 => 71,  175 => 70,  167 => 66,  163 => 65,  155 => 61,  151 => 60,  143 => 56,  139 => 55,  129 => 51,  125 => 50,  117 => 46,  113 => 45,  98 => 33,  94 => 32,  84 => 26,  72 => 24,  69 => 23,  63 => 20,  58 => 19,  55 => 18,  41 => 7,  36 => 6,  33 => 5,  28 => 3,);
    }
}
