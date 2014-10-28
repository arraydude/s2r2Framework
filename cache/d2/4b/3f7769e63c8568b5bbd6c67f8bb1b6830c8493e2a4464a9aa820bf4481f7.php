<?php

/* @SystemModule/Profile/Profile.twig */
class __TwigTemplate_d24b3f7769e63c8568b5bbd6c67f8bb1b6830c8493e2a4464a9aa820bf4481f7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Framework/Base.twig");

        $this->blocks = array(
            'cssResources' => array($this, 'block_cssResources'),
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
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("css/libs/jquery-jvectormap-1.2.2.css"), "html", null, true);
        echo "\" type=\"text/css\"/>
";
    }

    // line 10
    public function block_jsResources($context, array $blocks = array())
    {
        // line 11
        echo "    <script type=\"text/javascript\">
        var user = ";
        // line 12
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_jsonencode_filter($_user_);
        echo ";
        Twig.addTemplate('activityList', ";
        // line 13
        echo $this->env->getExtension('Stringify')->stringifyTwig("/Profile/Template/ActivityList.twig", "SystemModule");
        echo ");
    </script>
    <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/fwk/fwk.jquery.pager.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/profile.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "    <h1>User Profile</h1>
    <div class=\"row\" id=\"user-profile\">
        <div class=\"col-lg-3 col-md-4 col-sm-4\">
            <div class=\"main-box clearfix\">
                <h2>";
        // line 24
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_user_, "name"), "html", null, true);
        echo "</h2>

                <div class=\"profile-status hidden\">
                    <i class=\"fa fa-check-circle\"></i> Online
                </div>
                <img src=\"";
        // line 29
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_user_, "profile_photo"), "html", null, true);
        echo "\" alt=\"\" class=\"profile-img img-responsive center-block\"/>

                <div class=\"profile-label\">
                    <span class=\"label label-danger\">";
        // line 32
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, gettext($this->getAttribute($_user_, "role_name")), "html", null, true);
        echo "</span>
                </div>

                <div class=\"profile-stars hidden\">
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star-o\"></i>
                    <span>Super User</span>
                </div>

                <div class=\"profile-since hidden\">
                    Member since: ";
        // line 45
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($_user_, "created_date"), "m-d-Y"), "html", null, true);
        echo "
                </div>

                <div class=\"profile-details\">
                    <ul class=\"fa-ul\">
                        <li><i class=\"fa-li fa fa-briefcase\"></i>Modules: <span>";
        // line 50
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($_user_, "modules")), "html", null, true);
        echo "</span></li>
                        <li><i class=\"fa-li fa fa-tasks\"></i>Tasks done: <span>";
        // line 51
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($_user_, "activities")), "html", null, true);
        echo "</span></li>
                        <li><i class=\"fa-li fa fa-calendar\"></i>Last login:
                            <span>";
        // line 53
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($_user_, "last_login"), "m-d-Y"), "html", null, true);
        echo "</span></li>
                        <li><i class=\"fa-li fa fa-clock-o\"></i>Member since:
                            <span>";
        // line 55
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($_user_, "created_date"), "m-d-Y"), "html", null, true);
        echo "</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class=\"col-lg-9 col-md-8 col-sm-8\">
            <div class=\"main-box clearfix\">
                <div class=\"profile-header\">
                    <h3><span>User info</span></h3>
                </div>

                <div class=\"row profile-user-info\">
                    <div class=\"col-sm-6\">
                        <div class=\"profile-user-details clearfix\">
                            <div class=\"profile-user-details-label\">
                                Name
                            </div>
                            <div class=\"profile-user-details-value\">
                                ";
        // line 74
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_user_, "name"), "html", null, true);
        echo "
                            </div>
                        </div>
                        <div class=\"profile-user-details clearfix\">
                            <div class=\"profile-user-details-label\">
                                Username
                            </div>
                            <div class=\"profile-user-details-value\">
                                ";
        // line 82
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_user_, "username"), "html", null, true);
        echo "
                            </div>
                        </div>
                        <div class=\"profile-user-details clearfix\">
                            <div class=\"profile-user-details-label\">
                                Email
                            </div>
                            <div class=\"profile-user-details-value\">
                                ";
        // line 90
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_user_, "email"), "html", null, true);
        echo "
                            </div>
                        </div>
                    </div>
                    <div class=\"col-sm-6\">
                        <div class=\"profile-user-details clearfix\">
                            <div class=\"profile-user-details-label\">
                                Market
                            </div>
                            <div class=\"profile-user-details-value\">
                                ";
        // line 100
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_user_, "markets"));
        foreach ($context['_seq'] as $context["_key"] => $context["market"]) {
            // line 101
            echo "                                    ";
            if (isset($context["market"])) { $_market_ = $context["market"]; } else { $_market_ = null; }
            echo twig_escape_filter($this->env, $_market_, "html", null, true);
            echo ",
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['market'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 103
        echo "                            </div>
                        </div>
                        <div class=\"profile-user-details clearfix\">
                            <div class=\"profile-user-details-label\">
                                Environments
                            </div>
                            <div class=\"profile-user-details-value\">
                                ";
        // line 110
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_user_, "environments"));
        foreach ($context['_seq'] as $context["_key"] => $context["environment"]) {
            // line 111
            echo "                                    ";
            if (isset($context["environment"])) { $_environment_ = $context["environment"]; } else { $_environment_ = null; }
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $_environment_), "html", null, true);
            echo ",
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['environment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "                            </div>
                        </div>
                        <div class=\"profile-user-details clearfix\">
                            <div class=\"profile-user-details-label\">
                                Language
                            </div>
                            <div class=\"profile-user-details-value\">
                                ";
        // line 120
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_user_, "language"), "name"), "html", null, true);
        echo "
                            </div>
                        </div>
                    </div>
                </div>

                <div class=\"tabs-wrapper profile-tabs\">
                    <ul class=\"nav nav-tabs\">
                        <li class=\"active\"><a href=\"#tab-activity\" data-toggle=\"tab\">Activity</a></li>
                        <li><a href=\"#tab-privileges\" data-toggle=\"tab\">Privileges</a></li>
                    </ul>

                    <div class=\"tab-content\">

                        <div class=\"tab-pane fade in active\" id=\"tab-activity\">
                            <div class=\"table-responsive\">
                                <table class=\"table\">
                                    <tbody data-activities-list>
                                    ";
        // line 138
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_user_, "activities"));
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
            // line 139
            echo "                                        ";
            $this->env->loadTemplate("@SystemModule/Profile/Template/ActivityList.twig")->display($context);
            // line 140
            echo "                                    ";
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
        // line 141
        echo "                                    </tbody>
                                </table>
                            </div>

                            <button data-add-more=\"activities\" class=\"btn btn-default btn-large\"
                                    data-target=\"table.table [data-activities-list]\"
                                    data-src=\"system_user_getactivities\" style=\"width: 100%;\"><i
                                        class=\"fa fa-plus-square\"></i></button>
                        </div>

                        <div class=\"tab-pane fade\" id=\"tab-privileges\">
                            <div class=\"table-responsive\">
                                <table class=\"table\">
                                    <thead>
                                    <tr>
                                        <th><span>Role</span></th>
                                        <th class=\"text-right\"><span>Module</span></th>
                                        <th class=\"text-center\"><span>Controller</span></th>
                                        <th class=\"text-center\"><span>Action</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    ";
        // line 163
        if (isset($context["user"])) { $_user_ = $context["user"]; } else { $_user_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_user_, "privileges"));
        foreach ($context['_seq'] as $context["_key"] => $context["privilege"]) {
            // line 164
            echo "                                        <tr>
                                            <td>
                                                ";
            // line 166
            if (isset($context["roles"])) { $_roles_ = $context["roles"]; } else { $_roles_ = null; }
            if (isset($context["privilege"])) { $_privilege_ = $context["privilege"]; } else { $_privilege_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_roles_, $this->getAttribute($_privilege_, "role_id"), array(), "array"), "html", null, true);
            echo "
                                            </td>
                                            <td class=\"text-right\">
                                                ";
            // line 169
            if (isset($context["privilege"])) { $_privilege_ = $context["privilege"]; } else { $_privilege_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_privilege_, "module"), "html", null, true);
            echo "
                                            </td>
                                            <td class=\"text-center\">
                                                ";
            // line 172
            if (isset($context["privilege"])) { $_privilege_ = $context["privilege"]; } else { $_privilege_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_privilege_, "controller"), "html", null, true);
            echo "
                                            </td>
                                            <td class=\"text-center\">
                                                ";
            // line 175
            if (isset($context["privilege"])) { $_privilege_ = $context["privilege"]; } else { $_privilege_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_privilege_, "action"), "html", null, true);
            echo "
                                            </td>
                                        </tr>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['privilege'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 179
        echo "                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@SystemModule/Profile/Profile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  372 => 179,  361 => 175,  354 => 172,  347 => 169,  339 => 166,  335 => 164,  330 => 163,  306 => 141,  292 => 140,  289 => 139,  271 => 138,  249 => 120,  240 => 113,  230 => 111,  225 => 110,  216 => 103,  206 => 101,  201 => 100,  187 => 90,  175 => 82,  163 => 74,  140 => 55,  134 => 53,  128 => 51,  123 => 50,  114 => 45,  97 => 32,  90 => 29,  81 => 24,  75 => 20,  72 => 19,  66 => 16,  62 => 15,  57 => 13,  52 => 12,  49 => 11,  46 => 10,  40 => 7,  35 => 6,  32 => 5,  27 => 3,);
    }
}
