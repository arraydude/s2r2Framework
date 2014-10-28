<?php

/* @RebumpModule/Default/Bump.twig */
class __TwigTemplate_6e17a6197e73f61e041bfb1576a28029b90725dff94a0e16524ce73855c5af33 extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_cssResources($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("cssResources", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("css/libs/dropzone.min.css", "system"), "html", null, true);
        echo "\"/>
";
    }

    // line 8
    public function block_jsResources($context, array $blocks = array())
    {
        // line 9
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/libs/dropzone.min.js", "system"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->generateRoute("js/bump.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "    <h1>ReBump Tool</h1>

    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"main-box\" style=\"min-height: 130px\">
                <h2>Single Item Rebump</h2>
                <form class=\"form-inline\">
                    <div class=\"form-group\">
                        <input id=\"item_id\" type=\"text\" placeholder=\"Enter Item ID\" class=\"form-control\">

                        <button id=\"single_bump\" type=\"button\" class=\"btn btn-success\">
                            <i id=\"single_bump_icon\" class=\"fa fa-level-up\"></i> 
                            Bump!
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"main-box\" style=\"min-height: 820px;\">
                <h2>Drag &amp; Drop file upload</h2>

                <div id=\"dropzone\">
                    <form id=\"rebump-upload\" class=\"dropzone dz-clickable\" action=\"/Rebump/Upload/BumpFile\"
                          enctype=\"multipart/form-data\">
                        <div class=\"dz-default dz-message\">
                            <span>Drop files here to upload</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"main-box\" style=\"min-height: 820px;\">
                <h2>List uploads</h2>

                <div class=\"table-responsive\">
                    <table class=\"table table-striped table-hover list-files\">
                        <thead>
                            <tr>
                                <th><span class=\"text-left\">Id</span></th>
                                <th><span>User</span></th>
                                <th class=\"text-center\"><span>Status</span></th>
                                <th class=\"text-center\"><span>Created</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
        // line 61
        if (isset($context["list"])) { $_list_ = $context["list"]; } else { $_list_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_list_);
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 62
            echo "                                <tr>
                                    <td class=\"text-left\">
                                        ";
            // line 64
            if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_file_, "file_id"), "html", null, true);
            echo "
                                    </td>
                                    <td>
                                        ";
            // line 67
            if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_file_, "user"), "name"), "html", null, true);
            echo "
                                    </td>
                                    <td class=\"text-center\">
                                        ";
            // line 70
            $context["statusClass"] = array("Pending" => "warning", "Running" => "info", "Finished" => "success");
            // line 71
            echo "                                        <span class=\"label label-";
            if (isset($context["statusClass"])) { $_statusClass_ = $context["statusClass"]; } else { $_statusClass_ = null; }
            if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_statusClass_, $this->getAttribute($_file_, "status"), array(), "array"), "html", null, true);
            echo "\">";
            if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_file_, "status"), "html", null, true);
            echo "</span>
                                    </td>
                                    <td class=\"text-center\">
                                        ";
            // line 74
            if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_file_, "created_date"), "html", null, true);
            echo "
                                    </td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
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
        return "@RebumpModule/Default/Bump.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 78,  147 => 74,  135 => 71,  133 => 70,  126 => 67,  119 => 64,  115 => 62,  110 => 61,  61 => 14,  58 => 13,  52 => 10,  47 => 9,  44 => 8,  38 => 5,  33 => 4,  30 => 3,);
    }
}
