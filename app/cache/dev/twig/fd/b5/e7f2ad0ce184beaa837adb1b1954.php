<?php

/* zikmontFrontEndBundle::layout.html.twig */
class __TwigTemplate_fdb5e7f2ad0ce184beaa837adb1b1954 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/estilo.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "    <div id=\"content\">

        <div id=\"header\">
            <p id=\"top_info\">Browse <a href=\"#\">Today's favorites</a> or <a href=\"#\">All time favorites</a>.<br />Please <a href=\"#\">Log in</a> to share and download files.</p>

            <div id=\"logo\">
                    <h1><a href=\"#\" title=\"Centralized Internet Content\">Zikmont <span class=\"title\">Colombia</span></a></h1>
                    <p>La forma mas facil de hacerlo!</p>
            </div>
        </div>
        <div id=\"tabs\">
                <ul>\t
                        <li><a href=\"#\" accesskey=\"m\"><span class=\"key\">M</span>ovimientos</a></li>
                        <li><a class=\"current\" href=\"#\" accesskey=\"v\"><span class=\"key\">V</span>ideos</a></li>
                        <li><a href=\"#\" accesskey=\"r\">A<span class=\"key\">r</span>chives</a></li>
                        <li><a href=\"#\" accesskey=\"i\"><span class=\"key\">I</span>mages</a></li>
                        <li><a href=\"#\" accesskey=\"d\"><span class=\"key\">D</span>ocs</a></li>
                        <li><a href=\"#\" accesskey=\"a\"><span class=\"key\">A</span>ll</a></li>
                </ul>
                <div id=\"search\">
                        <form method=\"post\" action=\"?\">
                                <p><input type=\"text\" name=\"search\" class=\"search\" /> <input type=\"submit\" value=\"Search\" class=\"button\" /></p>
                        </form>
                </div>
        </div>

        <div class=\"left\">
                ";
        // line 34
        $this->displayBlock('content', $context, $blocks);
        // line 36
        echo "        </div>
        <div class=\"footer\">
                <p><a href=\"#\">RSS Feed</a> &middot; <a href=\"#\">Most Popular</a> &middot; <a href=\"#\">Today's Favorites</a> &middot; <a href=\"#\">All Time Favorites</a> &middot; <a href=\"#\">Sharing Policy</a> &middot; <a href=\"http://jigsaw.w3.org/css-validator/check/referer\">CSS</a> and <a href=\"http://validator.w3.org/check?uri=referer\">XHTML</a><br />
                &copy; Copyright 2006 Internet Sharing, Design: Luka Cvrk, <a title=\"Awsome Web Templates\" href=\"http://www.solucija.com/\">Solucija</a></p>
        </div>
    </div>
";
    }

    // line 34
    public function block_content($context, array $blocks = array())
    {
        // line 35
        echo "                ";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 35,  86 => 34,  76 => 36,  74 => 34,  45 => 7,  42 => 6,  36 => 4,  31 => 3,  28 => 2,);
    }
}
