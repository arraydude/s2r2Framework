<?php

/* @DebugModule/Default/fileExplorer.twig */
class __TwigTemplate_7afc6f864374d36163373969c1c09406953c2137caa9840290da194bde82084b extends Twig_Template
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
        $context["fileExplorerActive"] = true;
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_jsResources($context, array $blocks = array())
    {
        // line 6
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/jquery/jquery.nestable.js", "System"), "html", null, true);
        echo "\"></script>
";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "    <div class=\"clearfix\">
        <h1 class=\"pull-left\">File Explorer</h1>
    </div>

    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"main-box clearfix\">

                <div id=\"nestable-menu\">
                    <button type=\"button\" class=\"btn btn-primary\" data-action=\"expand-all\">Expand All</button>
                    <button type=\"button\" class=\"btn btn-danger\" data-action=\"collapse-all\">Collapse All</button>
                </div>

                <div class=\"row cf nestable-lists\">
                                
                    <div class=\"col-md-6 dd\" id=\"nestable\">

                        ";
        // line 27
        if (isset($context["folders"])) { $_folders_ = $context["folders"]; } else { $_folders_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_folders_);
        foreach ($context['_seq'] as $context["_key"] => $context["folder"]) {
            // line 28
            echo "
                            <li class=\"dd-item\">

                                <div class=\"dd-handle\">
                                    ";
            // line 32
            if (isset($context["folder"])) { $_folder_ = $context["folder"]; } else { $_folder_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_folder_, "name"), "html", null, true);
            echo "
                                    <div class=\"nested-links\">
                                        <span class=\"fa fa-folder-open\"></span>
                                    </div>
                                </div>

                                <ol class=\"dd-list\">
                                    <ol class=\"dd-list\">

                                         ";
            // line 41
            if (isset($context["folder"])) { $_folder_ = $context["folder"]; } else { $_folder_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($_folder_, "subfolders"));
            foreach ($context['_seq'] as $context["_key"] => $context["folderLevel2"]) {
                // line 42
                echo "                                            <li class=\"dd-item\">

                                                <div class=\"dd-handle\">
                                                    ";
                // line 45
                if (isset($context["folderLevel2"])) { $_folderLevel2_ = $context["folderLevel2"]; } else { $_folderLevel2_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_folderLevel2_, "name"), "html", null, true);
                echo "
                                                     <div class=\"nested-links\">
                                                        <span class=\"fa fa-folder-open\"></span>
                                                    </div>
                                                </div>

                                                <ol class=\"dd-list\">
                                                    <!-- Files of Level 2 -->
                                                    ";
                // line 53
                if (isset($context["folderLevel2"])) { $_folderLevel2_ = $context["folderLevel2"]; } else { $_folderLevel2_ = null; }
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($_folderLevel2_, "files"));
                foreach ($context['_seq'] as $context["_key"] => $context["fileLevel2"]) {
                    // line 54
                    echo "                                                        <li class=\"dd-item\">
                                                            <div class=\"dd-handle\" style=\"background-color: #D0F8BD;\">
                                                                ";
                    // line 56
                    if (isset($context["fileLevel2"])) { $_fileLevel2_ = $context["fileLevel2"]; } else { $_fileLevel2_ = null; }
                    echo twig_escape_filter($this->env, $_fileLevel2_, "html", null, true);
                    echo "
                                                                <a href=\"download/?file=";
                    // line 57
                    if (isset($context["folder"])) { $_folder_ = $context["folder"]; } else { $_folder_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_folder_, "name"), "html", null, true);
                    echo "/";
                    if (isset($context["folderLevel2"])) { $_folderLevel2_ = $context["folderLevel2"]; } else { $_folderLevel2_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_folderLevel2_, "name"), "html", null, true);
                    echo "/";
                    if (isset($context["fileLevel2"])) { $_fileLevel2_ = $context["fileLevel2"]; } else { $_fileLevel2_ = null; }
                    echo twig_escape_filter($this->env, $_fileLevel2_, "html", null, true);
                    echo "\">
                                                                    <div class=\"nested-links\">
                                                                        <span class=\"fa fa-download\"></span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fileLevel2'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 65
                echo "                                                </ol>
                                            </li> 
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['folderLevel2'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "
                                        <!-- Files of Level 1 -->
                                        ";
            // line 70
            if (isset($context["folder"])) { $_folder_ = $context["folder"]; } else { $_folder_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($_folder_, "files"));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 71
                echo "                                            <li class=\"dd-item\">
                                                <div class=\"dd-handle\" style=\"background-color: #D0F8BD;\">
                                                    ";
                // line 73
                if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
                echo twig_escape_filter($this->env, $_file_, "html", null, true);
                echo "
                                                    <a href=\"download/?file=";
                // line 74
                if (isset($context["folder"])) { $_folder_ = $context["folder"]; } else { $_folder_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_folder_, "name"), "html", null, true);
                echo "/";
                if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
                echo twig_escape_filter($this->env, $_file_, "html", null, true);
                echo "\">
                                                        <div class=\"nested-links\">
                                                            <span class=\"fa fa-download\"></span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 82
            echo "
                                    </ol>
                                </ol>
                            </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['folder'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "
                        <!-- Files of Root folder -->
                        ";
        // line 89
        if (isset($context["rootFiles"])) { $_rootFiles_ = $context["rootFiles"]; } else { $_rootFiles_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_rootFiles_);
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 90
            echo "                            <li class=\"dd-item\">
                                <div class=\"dd-handle\" style=\"background-color: #D0F8BD;\">
                                    ";
            // line 92
            if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
            echo twig_escape_filter($this->env, $_file_, "html", null, true);
            echo "
                                    <a href=\"download/?file=";
            // line 93
            if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
            echo twig_escape_filter($this->env, $_file_, "html", null, true);
            echo "\">
                                        <div class=\"nested-links\">
                                            <span class=\"fa fa-download\"></span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        echo "
                    </div>          
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 109
    public function block_javascripts($context, array $blocks = array())
    {
        // line 110
        echo "    \$('#nestable').nestable({
        group: 1,
    });

    \$('.dd').nestable('collapseAll');

    \$('#nestable-menu').on('click', function(e){
        var target = \$(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            \$('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            \$('.dd').nestable('collapseAll');
        }
    });
";
    }

    public function getTemplateName()
    {
        return "@DebugModule/Default/fileExplorer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 110,  242 => 109,  232 => 101,  217 => 93,  212 => 92,  208 => 90,  203 => 89,  199 => 87,  189 => 82,  171 => 74,  166 => 73,  162 => 71,  157 => 70,  153 => 68,  145 => 65,  124 => 57,  119 => 56,  115 => 54,  110 => 53,  98 => 45,  93 => 42,  88 => 41,  75 => 32,  69 => 28,  64 => 27,  45 => 10,  42 => 9,  35 => 6,  32 => 5,  27 => 3,);
    }
}
