<?php

/* @SystemModule/Roles/New.twig */
class __TwigTemplate_884f0c5c756275b8a12e50fa0ae03eddbd3fd7cca7d6097d7c637c40ad6eb8dd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Framework/Base.twig");

        $this->blocks = array(
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
        echo "<h1>Role</h1>
<form action=\"/system/roles/save\" method=\"post\" name=\"login\" role='form'>
    <div class=\"main-box\">
        <h2>Basic data</h2>
        <div class=\"form-group\">
            <label for=\"name\">";
        // line 15
        echo twig_escape_filter($this->env, gettext("Name"), "html", null, true);
        echo ":</label>
            <input type=\"text\" id=\"name\" name=\"name\" value=\"";
        // line 16
        if (isset($context["name"])) { $_name_ = $context["name"]; } else { $_name_ = null; }
        if ($_name_) {
            if (isset($context["name"])) { $_name_ = $context["name"]; } else { $_name_ = null; }
            echo twig_escape_filter($this->env, $_name_, "html", null, true);
        }
        echo "\" class=\"form-control\" required/>
        </div>
    </div>

    <div class=\"main-box\">
        <h2>Privileges</h2>

        <div class=\"row\" data-perms>
            <div class=\"panel-group accordion\" id=\"accordion\">
                ";
        // line 25
        if (isset($context["privileges"])) { $_privileges_ = $context["privileges"]; } else { $_privileges_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_privileges_);
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
        foreach ($context['_seq'] as $context["module"] => $context["controllers"]) {
            // line 26
            echo "
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\">
                            <h4 class=\"panel-title\">
                                <a class=\"accordion-toggle collapsed\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse";
            // line 30
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_loop_, "index"), "html", null, true);
            echo "\">
                                    ";
            // line 31
            if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
            echo twig_escape_filter($this->env, $_module_, "html", null, true);
            echo "
                                </a>
                            </h4>
                        </div>

                        <div id=\"collapse";
            // line 36
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_loop_, "index"), "html", null, true);
            echo "\" class=\"panel-collapse collapse\">
                            <div class=\"panel-body\">
                                <div class=\"form-group pull-left\">
                                    <div class=\"checkbox\">
                                        <input id=\"module-";
            // line 40
            if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
            echo twig_escape_filter($this->env, $_module_, "html", null, true);
            echo "\" type=\"checkbox\" name=\"\" value=\"";
            if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
            echo twig_escape_filter($this->env, $_module_, "html", null, true);
            echo "\" data-perms-module=\"";
            if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $_module_), "html", null, true);
            echo "\">
                                        <label for=\"module-";
            // line 41
            if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
            echo twig_escape_filter($this->env, $_module_, "html", null, true);
            echo "\" class=\"h4\">";
            if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
            echo twig_escape_filter($this->env, $_module_, "html", null, true);
            echo "</label>
                                        <ul class=\"list-without-style\">
                                            ";
            // line 43
            if (isset($context["controllers"])) { $_controllers_ = $context["controllers"]; } else { $_controllers_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_controllers_);
            foreach ($context['_seq'] as $context["controller"] => $context["controllerActions"]) {
                // line 44
                echo "                                                <li class=\"checkbox\">
                                                    <input type=\"checkbox\" id=\"";
                // line 45
                if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
                echo twig_escape_filter($this->env, $_module_, "html", null, true);
                echo "-controller-";
                if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
                echo twig_escape_filter($this->env, $_controller_, "html", null, true);
                echo "\" name=\"\" value=\"";
                if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
                echo twig_escape_filter($this->env, $_controller_, "html", null, true);
                echo "\"  data-perms-module=\"";
                if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $_module_), "html", null, true);
                echo "\" data-perms-controller=\"";
                if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $_controller_), "html", null, true);
                echo "\">
                                                    <label class=\"h5\" for=\"";
                // line 46
                if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
                echo twig_escape_filter($this->env, $_module_, "html", null, true);
                echo "-controller-";
                if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
                echo twig_escape_filter($this->env, $_controller_, "html", null, true);
                echo "\">";
                if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
                echo twig_escape_filter($this->env, $_controller_, "html", null, true);
                echo "</label>
                                                    <ul>
                                                        ";
                // line 48
                if (isset($context["controllerActions"])) { $_controllerActions_ = $context["controllerActions"]; } else { $_controllerActions_ = null; }
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($_controllerActions_);
                foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                    // line 49
                    echo "                                                            <li class=\"checkbox\">
                                                                ";
                    // line 50
                    if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
                    if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
                    if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
                    $context["actionName"] = (((($_module_ . "_") . $_controller_) . "_") . $_action_);
                    // line 51
                    echo "                                                                ";
                    if (isset($context["actionName"])) { $_actionName_ = $context["actionName"]; } else { $_actionName_ = null; }
                    $context["displayActionName"] = twig_lower_filter($this->env, $_actionName_);
                    // line 52
                    echo "                                                                <input type=\"checkbox\" id=\"";
                    if (isset($context["actionName"])) { $_actionName_ = $context["actionName"]; } else { $_actionName_ = null; }
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, $_actionName_), "html", null, true);
                    echo "\" name=\"privileges[]\" value=\"";
                    if (isset($context["actionName"])) { $_actionName_ = $context["actionName"]; } else { $_actionName_ = null; }
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, $_actionName_), "html", null, true);
                    echo "\" data-perms-module=\"";
                    if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, $_module_), "html", null, true);
                    echo "\" data-perms-controller=\"";
                    if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, $_controller_), "html", null, true);
                    echo "\" data-perms-action=\"";
                    if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, $_action_), "html", null, true);
                    echo "\" /> 
                                                                <label for=\"";
                    // line 53
                    if (isset($context["actionName"])) { $_actionName_ = $context["actionName"]; } else { $_actionName_ = null; }
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, $_actionName_), "html", null, true);
                    echo "\"> ";
                    if (isset($context["displayActionName"])) { $_displayActionName_ = $context["displayActionName"]; } else { $_displayActionName_ = null; }
                    echo twig_escape_filter($this->env, gettext($_displayActionName_), "html", null, true);
                    echo " </label>
                                                            </li>
                                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                echo "                                                    </ul>
                                                </li>
                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['controller'], $context['controllerActions'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                ";
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
        unset($context['_seq'], $context['_iterated'], $context['module'], $context['controllers'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "            </div>
        </div>
        <div class=\"clearfix\"></div>
    </div>
    ";
        // line 71
        if (isset($context["roleId"])) { $_roleId_ = $context["roleId"]; } else { $_roleId_ = null; }
        if ($_roleId_) {
            // line 72
            echo "        <input type=\"hidden\" name=\"roleId\" value=\"";
            if (isset($context["roleId"])) { $_roleId_ = $context["roleId"]; } else { $_roleId_ = null; }
            echo twig_escape_filter($this->env, $_roleId_, "html", null, true);
            echo "\" />
    ";
        }
        // line 74
        echo "    <button type=\"submit\" class=\"btn btn-success btn-large\" style=\"height: 50px;width: 100%;\">";
        echo twig_escape_filter($this->env, gettext("Save"), "html", null, true);
        echo "</button>
</form>
";
    }

    // line 78
    public function block_javascripts($context, array $blocks = array())
    {
        // line 79
        echo "    ";
        if (isset($context["checked"])) { $_checked_ = $context["checked"]; } else { $_checked_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_checked_);
        foreach ($context['_seq'] as $context["_key"] => $context["privilege"]) {
            // line 80
            echo "        \$('#";
            if (isset($context["privilege"])) { $_privilege_ = $context["privilege"]; } else { $_privilege_ = null; }
            echo twig_escape_filter($this->env, twig_join_filter(twig_slice($this->env, $_privilege_, 1), "_"), "html", null, true);
            echo "').prop('checked', true);
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['privilege'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@SystemModule/Roles/New.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  285 => 80,  279 => 79,  276 => 78,  268 => 74,  261 => 72,  258 => 71,  252 => 67,  231 => 59,  223 => 56,  210 => 53,  192 => 52,  188 => 51,  183 => 50,  180 => 49,  175 => 48,  163 => 46,  146 => 45,  143 => 44,  138 => 43,  129 => 41,  118 => 40,  110 => 36,  101 => 31,  96 => 30,  90 => 26,  72 => 25,  56 => 16,  52 => 15,  45 => 10,  42 => 9,  35 => 6,  32 => 5,  27 => 3,);
    }
}
