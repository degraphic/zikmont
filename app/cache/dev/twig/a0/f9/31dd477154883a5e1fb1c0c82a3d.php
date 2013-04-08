<?php

/* zikmontFrontEndBundle:Default:index.html.twig */
class __TwigTemplate_a0f931dd477154883a5e1fb1c0c82a3d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("zikmontFrontEndBundle::layout_app.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "zikmontFrontEndBundle::layout_app.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "        <!-- Main hero unit for a primary marketing message or call to action -->
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
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  26 => 2,);
    }
}
