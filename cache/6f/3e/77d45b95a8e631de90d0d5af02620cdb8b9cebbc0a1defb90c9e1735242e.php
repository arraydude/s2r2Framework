<?php

/* @DebugModule/Cron/default.twig */
class __TwigTemplate_6f3e77d45b95a8e631de90d0d5af02620cdb8b9cebbc0a1defb90c9e1735242e extends Twig_Template
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
        // line 2
        $context["cronActive"] = true;
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_jsResources($context, array $blocks = array())
    {
        // line 4
        echo "    <script type=\"text/javascript\">
        \$(function () {
            bindToggleEnabled();
        });

        function bindToggleEnabled() {
            \$(\".onoffswitch-checkbox\").off('click');
            \$(\".onoffswitch-checkbox\").on('click', function () {
                var that = \$(this);
                var cronId = that.val();
                var enabled = +that.is(':checked');
                jQuery.post('/debug/ajax/toggleCronEnable', {
                    'cronId': cronId,
                    'enabled': enabled
                }, function (data) {
                    if (data.success) {
                        var title = 'Success';
                        var message = 'Changes saved';
                        var type = 'success';
                    } else {
                        that.prop('checked', !enabled);
                        title = 'Error';
                        message = 'Changes not saved';
                        type = 'danger';
                    }
                    toast(message, title, 'fa fa-check-circle fa-fw fa-lg', type);
                }, \"json\");
            });
        }
    </script>
";
    }

    // line 36
    public function block_content($context, array $blocks = array())
    {
        // line 37
        echo "    <div class=\"clearfix\">
        <h1 class=\"pull-left\">Crons Listing</h1>
    </div>

    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"main-box clearfix\">
                <div class=\"table-responsive\">
                    <table class=\"table\">
                        <thead>
                            <tr>
                                <th><span>Name</span></th>
                                <th><span>File name</span></th>
                                <th><span>Module</span></th>
                                <th><span>Description</span></th>
                                <th><span>Last Execution</span></th>
                                <th class=\"text-center\"><span>Actions</span></th>
                            </tr>
                        </thead>
                        <tbody>
                        ";
        // line 57
        if (isset($context["crons"])) { $_crons_ = $context["crons"]; } else { $_crons_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_crons_);
        foreach ($context['_seq'] as $context["_key"] => $context["cron"]) {
            // line 58
            echo "                            <tr data-cron-id=\"";
            if (isset($context["cron"])) { $_cron_ = $context["cron"]; } else { $_cron_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cron_, "cron_id"), "html", null, true);
            echo "\">
                                <td>";
            // line 59
            if (isset($context["cron"])) { $_cron_ = $context["cron"]; } else { $_cron_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cron_, "name"), "html", null, true);
            echo "</td>
                                <td>";
            // line 60
            if (isset($context["cron"])) { $_cron_ = $context["cron"]; } else { $_cron_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cron_, "file_name"), "html", null, true);
            echo "</td>
                                <td>";
            // line 61
            if (isset($context["cron"])) { $_cron_ = $context["cron"]; } else { $_cron_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cron_, "module"), "html", null, true);
            echo "</td>
                                <td>";
            // line 62
            if (isset($context["cron"])) { $_cron_ = $context["cron"]; } else { $_cron_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cron_, "description"), "html", null, true);
            echo "</td>
                                <td>";
            // line 63
            if (isset($context["cron"])) { $_cron_ = $context["cron"]; } else { $_cron_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cron_, "last_execution"), "html", null, true);
            echo "</td>
                                <td>
                                    <div class=\"row\">
                                        <div class=\"col-sm-6 text-right\">
                                            ";
            // line 67
            if (isset($context["cron"])) { $_cron_ = $context["cron"]; } else { $_cron_ = null; }
            $context["cronFileName"] = twig_first($this->env, twig_split_filter($this->getAttribute($_cron_, "file_name"), "."));
            // line 68
            echo "                                            <a href=\"http://syslog.olx.com/en-US/app/search/flashtimeline?q=search%20source%3D%22%2Fvar%2Flog%2Fphp%2Fphp-error.log%22%20AND%20host%3D%22toolx-server%22%20AND%20NOT(%22ansible%22)%20AND(%22Cron-";
            if (isset($context["cronFileName"])) { $_cronFileName_ = $context["cronFileName"]; } else { $_cronFileName_ = null; }
            echo twig_escape_filter($this->env, $_cronFileName_, "html", null, true);
            echo "%22)&earliest=-24h%40h&latest=now\" target=\"_blank\" class=\"table-link\">
                                                <span class=\"fa-stack\">
                                                    <i class=\"fa fa-square fa-stack-2x\"></i>
                                                    <i class=\"fa fa-search-plus fa-stack-1x fa-inverse\"></i>
                                                </span>
                                            </a>
                                            <a href=\"/debug/cron/edit?id=";
            // line 74
            if (isset($context["cron"])) { $_cron_ = $context["cron"]; } else { $_cron_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cron_, "cron_id"), "html", null, true);
            echo "\" class=\"table-link\">
                                                <span class=\"fa-stack\">
                                                    <i class=\"fa fa-square fa-stack-2x\"></i>
                                                    <i class=\"fa fa-pencil fa-stack-1x fa-inverse\"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <div class=\"col-sm-6 text-left\">
                                            <div class=\"onoffswitch onoffswitch-success\">
                                                <input type=\"checkbox\" class=\"onoffswitch-checkbox\" id=\"switch-";
            // line 83
            if (isset($context["cron"])) { $_cron_ = $context["cron"]; } else { $_cron_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cron_, "cron_id"), "html", null, true);
            echo "\" ";
            if (isset($context["cron"])) { $_cron_ = $context["cron"]; } else { $_cron_ = null; }
            if ($this->getAttribute($_cron_, "enabled")) {
                echo "checked";
            }
            echo " value=\"";
            if (isset($context["cron"])) { $_cron_ = $context["cron"]; } else { $_cron_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cron_, "cron_id"), "html", null, true);
            echo "\">
                                                <label class=\"onoffswitch-label\" for=\"switch-";
            // line 84
            if (isset($context["cron"])) { $_cron_ = $context["cron"]; } else { $_cron_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_cron_, "cron_id"), "html", null, true);
            echo "\">
                                                    <div class=\"onoffswitch-inner\"></div>
                                                    <div class=\"onoffswitch-switch\"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cron'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo "                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@DebugModule/Cron/default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  189 => 94,  172 => 84,  159 => 83,  146 => 74,  135 => 68,  132 => 67,  124 => 63,  119 => 62,  114 => 61,  109 => 60,  104 => 59,  98 => 58,  93 => 57,  71 => 37,  68 => 36,  34 => 4,  31 => 3,  26 => 2,);
    }
}
