<?php

/* @DebugModule/menu.twig */
class __TwigTemplate_348cf084604f632562baf267f27d0b01a9b10286461bfff89c29fb50b37c59f5 extends Twig_Template
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
        echo "<a href=\"/debug\" class=\"menu dropdown-toggle\"> <i class=\"fa fa-rocket\"></i> <span>Debug</span> <i class=\"fa fa-chevron-circle-down drop-icon\"></i> </a> <ul class=\"submenu\" ";
        if (isset($context["moduleActive"])) { $_moduleActive_ = $context["moduleActive"]; } else { $_moduleActive_ = null; }
        if ($_moduleActive_) {
            echo "style=\"display:block;\"";
        }
        echo "> 
<li><a ";
        // line 2
        if (isset($context["phpInfoActive"])) { $_phpInfoActive_ = $context["phpInfoActive"]; } else { $_phpInfoActive_ = null; }
        if ($_phpInfoActive_) {
            echo "class=\"active\"";
        }
        echo " href=\"/debug/default/info\">PHP Info</a></li>
<li><a ";
        // line 3
        if (isset($context["fileExplorerActive"])) { $_fileExplorerActive_ = $context["fileExplorerActive"]; } else { $_fileExplorerActive_ = null; }
        if ($_fileExplorerActive_) {
            echo "class=\"active\"";
        }
        echo " href=\"/debug/default/default\">File Explorer</a></li>
<li><a ";
        // line 4
        if (isset($context["cacheActive"])) { $_cacheActive_ = $context["cacheActive"]; } else { $_cacheActive_ = null; }
        if ($_cacheActive_) {
            echo "class=\"active\"";
        }
        echo " href=\"/debug/cache/default\">Cache Management</a></li>
<li><a ";
        // line 5
        if (isset($context["cronActive"])) { $_cronActive_ = $context["cronActive"]; } else { $_cronActive_ = null; }
        if ($_cronActive_) {
            echo "class=\"active\"";
        }
        echo " href=\"/debug/cron/default\">Cron Management</a></li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "@DebugModule/menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 5,  41 => 4,  34 => 3,  27 => 2,  66 => 34,  54 => 26,  46 => 24,  19 => 1,  149 => 52,  145 => 50,  140 => 49,  137 => 48,  133 => 15,  130 => 14,  124 => 44,  113 => 42,  109 => 41,  106 => 40,  92 => 39,  89 => 38,  80 => 31,  78 => 30,  64 => 18,  61 => 17,  58 => 16,  56 => 14,  52 => 12,  49 => 25,  43 => 23,  38 => 7,  35 => 6,  30 => 4,  28 => 3,);
    }
}
