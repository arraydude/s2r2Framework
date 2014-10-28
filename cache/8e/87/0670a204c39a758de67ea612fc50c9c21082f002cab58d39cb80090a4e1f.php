<?php

/* @SystemModule/Register/RegisterWizard.twig */
class __TwigTemplate_8e870670a204c39a758de67ea612fc50c9c21082f002cab58d39cb80090a4e1f extends Twig_Template
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
        $context["systemModuleActive"] = array("users" => true);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_cssResources($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->displayParentBlock("cssResources", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("css/compiled/wizard.css"), "html", null, true);
        echo "\">
    <style type=\"text/css\">
        #step3 button[type=submit] {
            display: block;
            margin: 15% auto;
            width: 150px;
            font-size: 30px;
        }
    </style>
";
    }

    // line 18
    public function block_jsResources($context, array $blocks = array())
    {
        // line 19
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/jquery/wizard.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/register.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 23
    public function block_content($context, array $blocks = array())
    {
        // line 24
        echo "    <h1>";
        if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
        if ($this->getAttribute($_userData_, "user_id")) {
            if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
            echo twig_escape_filter($this->env, (gettext("Edit User: ") . $this->getAttribute($_userData_, "username")), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, gettext("New User"), "html", null, true);
        }
        echo "</h1>
    <form action=\"/system/register/register\" method=\"post\" name=\"login\" role='form'>
        <input type='hidden' name='userId' value='";
        // line 26
        if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_userData_, "user_id"), "html", null, true);
        echo "'>
        <div class=\"col-lg-12\">
            <div class=\"main-box\" style=\"min-height: 700px;\">
                <div id=\"registerWizard\" class=\"wizard\">
                    <div class=\"wizard-inner\">
                        <ul class=\"steps\">
                            <li data-target=\"#step1\" class=\"active\"><span class=\"badge badge-primary\">1</span>";
        // line 32
        echo twig_escape_filter($this->env, gettext("Basic Data"), "html", null, true);
        echo "<span class=\"chevron\"></span></li>
                            <li data-target=\"#step2\"><span class=\"badge\">2</span>";
        // line 33
        echo twig_escape_filter($this->env, gettext("Privileges"), "html", null, true);
        echo "<span class=\"chevron\"></span></li>
                            <li data-target=\"#step3\"><span class=\"badge\">3</span>Confirm<span class=\"chevron\"></span></li>
                        </ul>
                        <div class=\"actions\">
                            <button type=\"button\" class=\"btn btn-default btn-mini btn-prev\">Prev <i class=\"icon-arrow-left\"></i></button>
                            <button type=\"button\" class=\"btn btn-success btn-mini btn-next\">Next<i class=\"icon-arrow-right\"></i></button>
                        </div>
                    </div>
                    <div class=\"step-content\">
                        <div class=\"step-pane active\" id=\"step1\">
                            <br />
                            <div class=\"form-group\">
                                <label for=\"username\" class=\"control-label\">";
        // line 45
        echo twig_escape_filter($this->env, gettext("Username"), "html", null, true);
        echo ":</label>
                                <input type=\"text\" placeholder=\"\" id=\"username\" name=\"username\" value=\"";
        // line 46
        if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_userData_, "username"), "html", null, true);
        echo "\" autocomplete=\"on\" required class=\"form-control\"/>
                            </div>

                            <div class=\"form-group\">
                                <label for=\"password\" class=\"control-label\">";
        // line 50
        echo twig_escape_filter($this->env, gettext("Password"), "html", null, true);
        echo ":</label>
                                <input type=\"password\" placeholder=\"\" id=\"password\" name=\"password\" class=\"form-control\" ";
        // line 51
        if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
        if ((!$this->getAttribute($_userData_, "user_id"))) {
            echo "required";
        }
        echo " />
                            </div>

                            <div class=\"form-group\">
                                <label for=\"email\" class=\"control-label\">";
        // line 55
        echo twig_escape_filter($this->env, gettext("Email"), "html", null, true);
        echo ":</label>
                                <input type=\"email\" id=\"email\" name=\"email\" autocomplete=\"on\" value=\"";
        // line 56
        if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_userData_, "email"), "html", null, true);
        echo "\" class=\"form-control\" required/>
                            </div>

                            <div class=\"form-group\">
                                <label for=\"referer_email\" class=\"control-label\">";
        // line 60
        echo twig_escape_filter($this->env, gettext("Email Referer"), "html", null, true);
        echo ":</label>
                                <input type=\"email\" id=\"referer_email\" name=\"referer_email\" autocomplete=\"on\" value=\"";
        // line 61
        if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_userData_, "referer_email"), "html", null, true);
        echo "\" class=\"form-control\"/>
                            </div>

                            <div class=\"form-group\">
                                <label for=\"jira_username\">";
        // line 65
        echo twig_escape_filter($this->env, gettext("JIRA Username"), "html", null, true);
        echo ":</label>
                                <input type=\"text\" id=\"jira_username\" name=\"jira_username\" autocomplete=\"on\" value=\"";
        // line 66
        if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_userData_, "jira_username"), "html", null, true);
        echo "\" class=\"form-control\" />
                            </div>
                            
                            <div class=\"form-group\">
                                <label for=\"name\">";
        // line 70
        echo twig_escape_filter($this->env, gettext("Full Name"), "html", null, true);
        echo ":</label>
                                <input type=\"text\" id=\"name\" name=\"name\" autocomplete=\"on\" value=\"";
        // line 71
        if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_userData_, "name"), "html", null, true);
        echo "\" class=\"form-control\" required/>
                            </div>

                            <div class=\"form-group\">
                                <label for=\"language\" class=\"control-label\">";
        // line 75
        echo twig_escape_filter($this->env, gettext("Admin Language"), "html", null, true);
        echo ":</label>
                                <select name=\"language_id\" id=\"language\" class=\"form-control\" required>
                                    ";
        // line 77
        if (isset($context["languages"])) { $_languages_ = $context["languages"]; } else { $_languages_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_languages_);
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 78
            echo "                                        <option ";
            if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
            if (isset($context["language"])) { $_language_ = $context["language"]; } else { $_language_ = null; }
            if (($this->getAttribute($_userData_, "language_id") == $this->getAttribute($_language_, "language_id"))) {
                echo "selected";
            }
            echo " value=\"";
            if (isset($context["language"])) { $_language_ = $context["language"]; } else { $_language_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_language_, "language_id"), "html", null, true);
            echo "\">";
            if (isset($context["language"])) { $_language_ = $context["language"]; } else { $_language_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_language_, "name"), "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "                                </select>
                            </div>
                                
                            <div class=\"form-group\">
                                <label for=\"allowed_environments\" class=\"control-label\">";
        // line 84
        echo twig_escape_filter($this->env, gettext("Allowed Environments"), "html", null, true);
        echo ":</label>
                                <select id=\"allowed_environments\" class=\"form-control\" required multiple>
                                    ";
        // line 86
        if (isset($context["environments"])) { $_environments_ = $context["environments"]; } else { $_environments_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_environments_);
        foreach ($context['_seq'] as $context["_key"] => $context["environment"]) {
            // line 87
            echo "                                        <option ";
            if (isset($context["environment"])) { $_environment_ = $context["environment"]; } else { $_environment_ = null; }
            if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
            if (twig_in_filter($_environment_, $this->getAttribute($_userData_, "allowed_environments"))) {
                echo "selected";
            }
            echo " value=\"";
            if (isset($context["environment"])) { $_environment_ = $context["environment"]; } else { $_environment_ = null; }
            echo twig_escape_filter($this->env, $_environment_, "html", null, true);
            echo "\">";
            if (isset($context["environment"])) { $_environment_ = $context["environment"]; } else { $_environment_ = null; }
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $_environment_), "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['environment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 89
        echo "                                </select>
                            </div>

                            <div class=\"form-group\">
                                <label for=\"market\" class=\"control-label\">";
        // line 93
        echo twig_escape_filter($this->env, gettext("Markets"), "html", null, true);
        echo ":</label>
                                <select multiple id=\"markets\" class=\"form-control\" required>
                                    ";
        // line 95
        if (isset($context["markets"])) { $_markets_ = $context["markets"]; } else { $_markets_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_markets_);
        foreach ($context['_seq'] as $context["market_id"] => $context["market_name"]) {
            // line 96
            echo "                                        <option ";
            if (isset($context["market_id"])) { $_market_id_ = $context["market_id"]; } else { $_market_id_ = null; }
            if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
            if (twig_in_filter($_market_id_, twig_get_array_keys_filter($this->getAttribute($_userData_, "markets")))) {
                echo "selected";
            }
            echo " value=\"";
            if (isset($context["market_id"])) { $_market_id_ = $context["market_id"]; } else { $_market_id_ = null; }
            echo twig_escape_filter($this->env, $_market_id_, "html", null, true);
            echo "\">";
            if (isset($context["market_name"])) { $_market_name_ = $context["market_name"]; } else { $_market_name_ = null; }
            echo twig_escape_filter($this->env, $_market_name_, "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['market_id'], $context['market_name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 98
        echo "                                </select>
                            </div>
                            
                        </div>
                        <div class=\"step-pane\" id=\"step2\">
                            <div class=\"row\">
                                <h3>";
        // line 104
        echo twig_escape_filter($this->env, gettext("Group of Privileges"), "html", null, true);
        echo ":</h3>
                                <div class=\"form-group\">
                                    <select name=\"role_id\" id=\"role\" class=\"form-control\" required>
                                        <option value=\"\">";
        // line 107
        echo twig_escape_filter($this->env, gettext("Please select"), "html", null, true);
        echo "</option>
                                        ";
        // line 108
        if (isset($context["roles"])) { $_roles_ = $context["roles"]; } else { $_roles_ = null; }
        if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
        $this->env->loadTemplate("@SystemModule/User/Template/RoleTree.twig")->display(array_merge($context, array("roles" => $_roles_, "level" => 0, "userData" => $_userData_)));
        // line 109
        echo "                                    </select>
                                </div>
                            </div>
                            <div class=\"perms spinner hidden\" style=\"margin-top: 10%;\">
                                <i class=\"fa fa-spinner\"></i>
                            </div>
                            <div class=\"row ";
        // line 115
        if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
        if ((!$this->getAttribute($_userData_, "user_id"))) {
            echo "hidden";
        }
        echo "\" data-perms>
                                <div class=\"panel-group accordion\" id=\"accordion\">
                                    ";
        // line 117
        if (isset($context["actions"])) { $_actions_ = $context["actions"]; } else { $_actions_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_actions_);
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
            // line 118
            echo "
                                        <div class=\"panel panel-default\">
                                            <div class=\"panel-heading\">
                                                <h4 class=\"panel-title\">
                                                    <a class=\"accordion-toggle collapsed\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse";
            // line 122
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_loop_, "index"), "html", null, true);
            echo "\">
                                                        ";
            // line 123
            if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
            echo twig_escape_filter($this->env, $_module_, "html", null, true);
            echo "
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id=\"collapse";
            // line 128
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_loop_, "index"), "html", null, true);
            echo "\" class=\"panel-collapse collapse\">
                                                <div class=\"panel-body\">
                                                    <div class=\"form-group pull-left\">
                                                        <div class=\"checkbox\">
                                                            <input id=\"module-";
            // line 132
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
            // line 133
            if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
            echo twig_escape_filter($this->env, $_module_, "html", null, true);
            echo "\" class=\"h4\">";
            if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
            echo twig_escape_filter($this->env, $_module_, "html", null, true);
            echo "</label>
                                                            <ul class=\"list-without-style\">
                                                                ";
            // line 135
            if (isset($context["controllers"])) { $_controllers_ = $context["controllers"]; } else { $_controllers_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_controllers_);
            foreach ($context['_seq'] as $context["controller"] => $context["controllerActions"]) {
                // line 136
                echo "                                                                    <li class=\"checkbox\">
                                                                        <input type=\"checkbox\" id=\"";
                // line 137
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
                // line 138
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
                // line 140
                if (isset($context["controllerActions"])) { $_controllerActions_ = $context["controllerActions"]; } else { $_controllerActions_ = null; }
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($_controllerActions_);
                foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                    // line 141
                    echo "                                                                                <li class=\"checkbox\">
                                                                                    ";
                    // line 142
                    if (isset($context["module"])) { $_module_ = $context["module"]; } else { $_module_ = null; }
                    if (isset($context["controller"])) { $_controller_ = $context["controller"]; } else { $_controller_ = null; }
                    if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
                    $context["actionName"] = (((($_module_ . "_") . $_controller_) . "_") . $_action_);
                    // line 143
                    echo "                                                                                    ";
                    if (isset($context["actionName"])) { $_actionName_ = $context["actionName"]; } else { $_actionName_ = null; }
                    $context["displayActionName"] = twig_lower_filter($this->env, $_actionName_);
                    // line 144
                    echo "                                                                                    <input type=\"checkbox\" id=\"";
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
                    // line 145
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
                // line 148
                echo "                                                                        </ul>
                                                                    </li>
                                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['controller'], $context['controllerActions'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 151
            echo "                                                            </ul>
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
        // line 159
        echo "                                </div>
                            </div>
                        </div>
                        <div class=\"step-pane\" id=\"step3\">
                            <button type=\"submit\" class=\"btn btn-success\">";
        // line 163
        echo twig_escape_filter($this->env, gettext("Save"), "html", null, true);
        echo "</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
";
    }

    // line 172
    public function block_javascripts($context, array $blocks = array())
    {
        // line 173
        echo "    \$( document ).ready(function() {
        \$(\"#markets\").change(function() {
            \$(this).prop('name', 'markets[]');
        });
        \$(\"#allowed_environments\").change(function() {
            \$(this).prop('name', 'allowed_environments[]');
        });
        ";
        // line 180
        if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
        if ($this->getAttribute($_userData_, "user_id")) {
            // line 181
            echo "            \$('#role').change();
        ";
        }
        // line 183
        echo "        ";
        if (isset($context["userData"])) { $_userData_ = $context["userData"]; } else { $_userData_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_userData_, "privileges"));
        foreach ($context['_seq'] as $context["_key"] => $context["privilege"]) {
            // line 184
            echo "            \$('#";
            if (isset($context["privilege"])) { $_privilege_ = $context["privilege"]; } else { $_privilege_ = null; }
            echo twig_escape_filter($this->env, twig_join_filter(twig_slice($this->env, $_privilege_, 1, 3), "_"), "html", null, true);
            echo "').prop('checked', true);
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['privilege'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 186
        echo "    });
";
    }

    public function getTemplateName()
    {
        return "@SystemModule/Register/RegisterWizard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  557 => 186,  547 => 184,  541 => 183,  537 => 181,  534 => 180,  525 => 173,  522 => 172,  510 => 163,  504 => 159,  483 => 151,  475 => 148,  462 => 145,  444 => 144,  440 => 143,  435 => 142,  432 => 141,  427 => 140,  415 => 138,  398 => 137,  395 => 136,  390 => 135,  381 => 133,  370 => 132,  362 => 128,  353 => 123,  348 => 122,  342 => 118,  324 => 117,  316 => 115,  308 => 109,  304 => 108,  300 => 107,  294 => 104,  286 => 98,  267 => 96,  262 => 95,  257 => 93,  251 => 89,  232 => 87,  227 => 86,  222 => 84,  216 => 80,  197 => 78,  192 => 77,  187 => 75,  179 => 71,  175 => 70,  167 => 66,  163 => 65,  155 => 61,  151 => 60,  143 => 56,  139 => 55,  129 => 51,  125 => 50,  117 => 46,  113 => 45,  98 => 33,  94 => 32,  84 => 26,  72 => 24,  69 => 23,  63 => 20,  58 => 19,  55 => 18,  41 => 7,  36 => 6,  33 => 5,  28 => 3,);
    }
}
