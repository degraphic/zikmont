<?php

/* zikmontFrontEndBundle::layout.html.twig */
class __TwigTemplate_aa3e6a08020008a8f8bc867eedfc0b07 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/menukasten.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
<link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
<link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/bootstrap-responsive.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
<link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/docs.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
<link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/prettify.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
<link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/reveal.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
<link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/barra/jx.stylesheet.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo "
<div id=\"myModal\" class=\"reveal-modal\">
    <h1>Iniciar Sesión</h1>
    <hr>
    <h3>Usuario</h3>
    <input type=\"text\" name=\"txtusuario\"/>

    <h3>Contraseña</h3>
    <input type=\"password\" name=\"txtcontrasena\"/>

    <br/>

    <input type=\"submit\" value=\"Ingresar\" class=\"button\" />

    <hr>
    <p>Recuerde que estos datos son confidenciales y no deben ser compartidos.</p>
    <a class=\"close-reveal-modal\">&#215;</a>
</div>

<div id=\"content\">
    
    ";
        // line 34
        echo $this->env->getExtension('actions')->renderAction("zikmontFrontEndBundle:Menu:documentos", array(), array());
        // line 35
        echo "
    <div class=\"container\">

        <!-- Main hero unit for a primary marketing message or call to action -->
        <div class=\"hero-unit\">
            <h1>Zikmont, La forma fácil de hacerlo!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class=\"btn btn-primary btn-large\">Learn more &raquo;</a></p>
        </div>

        <!-- Example row of columns -->
        <div class=\"row\">
            <div class=\"span4\">
                <h2>Inventario</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p><a class=\"btn\" href=\"#\">View details &raquo;</a></p>
            </div>
            <div class=\"span4\">
                <h2>Cartera</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p><a class=\"btn\" href=\"#\">View details &raquo;</a></p>
            </div>
            <div class=\"span4\">
                <h2>Contabilidad</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class=\"btn\" href=\"#\">View details &raquo;</a></p>
            </div>
        </div>

        <hr>

        <footer>
            <p><a href=\"#\">RSS Feed</a> &middot; <a href=\"#\">Most Popular</a> &middot; <a href=\"#\">Today's Favorites</a> &middot; <a href=\"#\">All Time Favorites</a> &middot; <a href=\"#\">Sharing Policy</a> &middot; <a href=\"http://jigsaw.w3.org/css-validator/check/referer\">CSS</a> and <a href=\"http://validator.w3.org/check?uri=referer\">XHTML</a><br />
                &copy; Copyright 2012 Zikmont Link!, Diseñado por: Luka Cvrk, <a title=\"\" href=\"#\">Zikmont</a></p>
        </footer>

    </div>
</div>
";
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
        return array (  93 => 35,  91 => 34,  68 => 13,  65 => 12,  59 => 10,  55 => 9,  51 => 8,  47 => 7,  43 => 6,  39 => 5,  35 => 4,  30 => 3,  27 => 2,  29 => 3,  26 => 2,);
    }
}
