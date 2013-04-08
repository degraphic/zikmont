<?php

/* zikmontFrontEndBundle:Utilidades:index.html.twig */
class __TwigTemplate_d511884bef653fdcd86760173aa232da extends Twig_Template
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
        echo "
<header class=\"jumbotron subhead\" id=\"overview\">
    <div class=\"subnav\">
        <ul class=\"nav nav-pills\">
            <li><a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("regenerarkardex"), "html", null, true);
        echo "\">Procesos</a></li>
            <li><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("regenerarkardex"), "html", null, true);
        echo "\">Inventario</a></li>
            <li><a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("regenerarkardex"), "html", null, true);
        echo "\">Regenerar Kardex</a></li>
        </ul>
    </div>
</header>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Utilidades:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 9,  39 => 8,  35 => 7,  29 => 3,  26 => 2,);
    }
}
