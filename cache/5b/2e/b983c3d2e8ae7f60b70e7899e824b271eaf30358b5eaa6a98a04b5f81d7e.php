<?php

/* @DebugModule/Cache/cacheAdm.twig */
class __TwigTemplate_5b2eb983c3d2e8ae7f60b70e7899e824b271eaf30358b5eaa6a98a04b5f81d7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Framework/Base.twig");

        $this->blocks = array(
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
        // line 2
        $context["cacheActive"] = true;
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"clearfix\">
        <h1 class=\"pull-left\">Apc Cache Adm</h1>
    </div>

    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"main-box clearfix\">
                <ul class=\"list-group\">

                    <h2> APC - All stats </h2>

                    <span class=\"label label-success\">Free ";
        // line 15
        if (isset($context["apcStats"])) { $_apcStats_ = $context["apcStats"]; } else { $_apcStats_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_apcStats_, "freeMemory"), "html", null, true);
        echo " (";
        if (isset($context["apcStats"])) { $_apcStats_ = $context["apcStats"]; } else { $_apcStats_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_apcStats_, "freePercent"), "html", null, true);
        echo "%)</span> <span class=\"label label-danger\">Used ";
        if (isset($context["apcStats"])) { $_apcStats_ = $context["apcStats"]; } else { $_apcStats_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_apcStats_, "usedMemory"), "html", null, true);
        echo " (";
        if (isset($context["apcStats"])) { $_apcStats_ = $context["apcStats"]; } else { $_apcStats_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_apcStats_, "usedPercent"), "html", null, true);
        echo "%)</span>
                    <div class=\"progress progress-striped progress-4x active\" style=\"margin-top: 10px\">
                        <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuenow=\"";
        // line 17
        if (isset($context["apcStats"])) { $_apcStats_ = $context["apcStats"]; } else { $_apcStats_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_apcStats_, "freePercent"), "html", null, true);
        echo "\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
        if (isset($context["apcStats"])) { $_apcStats_ = $context["apcStats"]; } else { $_apcStats_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_apcStats_, "freePercent"), "html", null, true);
        echo "%\"  data-toggle=\"tooltip\" 
                        title=\"";
        // line 18
        if (isset($context["apcStats"])) { $_apcStats_ = $context["apcStats"]; } else { $_apcStats_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_apcStats_, "freePercent"), "html", null, true);
        echo " %\">
                            <span class=\"sr-only\">";
        // line 19
        if (isset($context["apcStats"])) { $_apcStats_ = $context["apcStats"]; } else { $_apcStats_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_apcStats_, "freePercent"), "html", null, true);
        echo "%</span>
                        </div>
                        <div class=\"progress-bar progress-bar-danger\" role=\"progressbar\" aria-valuenow=\"";
        // line 21
        if (isset($context["apcStats"])) { $_apcStats_ = $context["apcStats"]; } else { $_apcStats_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_apcStats_, "usedPercent"), "html", null, true);
        echo "\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ";
        if (isset($context["apcStats"])) { $_apcStats_ = $context["apcStats"]; } else { $_apcStats_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_apcStats_, "usedPercent"), "html", null, true);
        echo "%\" data-toggle=\"tooltip\" 
                        title=\"";
        // line 22
        if (isset($context["apcStats"])) { $_apcStats_ = $context["apcStats"]; } else { $_apcStats_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_apcStats_, "usedPercent"), "html", null, true);
        echo " %\">
                            <span class=\"sr-only\">";
        // line 23
        if (isset($context["apcStats"])) { $_apcStats_ = $context["apcStats"]; } else { $_apcStats_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_apcStats_, "usedPercent"), "html", null, true);
        echo "</span>
                        </div>
                    </div>


                    <hr>
                    <h2> APC - user </h2>
                    ";
        // line 30
        if (isset($context["apcList"])) { $_apcList_ = $context["apcList"]; } else { $_apcList_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_apcList_);
        foreach ($context['_seq'] as $context["_key"] => $context["apcItem"]) {
            // line 31
            echo "                        <li class=\"list-group-item\">
                            <a href=\"#\" data-key=\"";
            // line 32
            if (isset($context["apcItem"])) { $_apcItem_ = $context["apcItem"]; } else { $_apcItem_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_apcItem_, "key"), "html", null, true);
            echo "\" class=\"deleteCacheKey pull-right\"> 
                                <span class=\"badge badge-danger\">Delete</span>
                            </a>
                            ";
            // line 35
            if (isset($context["apcItem"])) { $_apcItem_ = $context["apcItem"]; } else { $_apcItem_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_apcItem_, "key"), "html", null, true);
            echo "
                            <a><span class=\"badge badge-success\">";
            // line 36
            if (isset($context["apcItem"])) { $_apcItem_ = $context["apcItem"]; } else { $_apcItem_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_apcItem_, "hits"), "html", null, true);
            echo " Hits</span></a>
                            <a><span class=\"badge badge-warning\">";
            // line 37
            if (isset($context["apcItem"])) { $_apcItem_ = $context["apcItem"]; } else { $_apcItem_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_apcItem_, "size"), "html", null, true);
            echo "</span></a>
                        </li>
                        ";
            // line 39
            if (isset($context["apcItem"])) { $_apcItem_ = $context["apcItem"]; } else { $_apcItem_ = null; }
            echo twig_var_dump($this->env, $context, $this->getAttribute($_apcItem_, "value"));
            echo "
                        <br />
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['apcItem'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "                    
                </ul>
            </div>
        </div>
    </div>
";
    }

    // line 49
    public function block_javascripts($context, array $blocks = array())
    {
        // line 50
        echo "    \$('.deleteCacheKey').click(function () {
        var cacheKey = \$(this).data('key');
        if (cacheKey) {
            bootbox.confirm('¿ Are you sure ?', function (remove) {
                if (remove) {
                    location.href = 'delete/?key=' + cacheKey;
                }
            });
        }
    });
";
    }

    public function getTemplateName()
    {
        return "@DebugModule/Cache/cacheAdm.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 50,  155 => 49,  146 => 42,  136 => 39,  130 => 37,  125 => 36,  120 => 35,  113 => 32,  110 => 31,  105 => 30,  94 => 23,  89 => 22,  81 => 21,  75 => 19,  70 => 18,  62 => 17,  47 => 15,  34 => 4,  31 => 3,  26 => 2,);
    }
}
