<?php

/* zikmontFrontEndBundle::layout_app.html.twig */
class __TwigTemplate_2b603077846c8191264aa3966d0caa17 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
<link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/bootstrap-responsive.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
<link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/docs.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
<link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/reveal.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
<link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/barra/jx.stylesheet.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo "

<div id=\"myModal\" class=\"reveal-modal\">
    <h1>Cerrar Sesión</h1>
    <hr>

    <p>Recuerde cambiar su contraseña periodicamente...</p>

    <input class=\"btn btn-primary\" type=\"submit\" value=\"Aceptar\" />
    <input class=\"btn\" type=\"submit\" class=\"close-reveal-modal\" value=\"Cancelar\" />

    <hr>

    <a class=\"close-reveal-modal\">&#215;</a>
</div>

";
        // line 27
        echo $this->env->getExtension('actions')->renderAction("zikmontFrontEndBundle:Menu:documentos", array(), array());
        // line 28
        echo "
<div class=\"container\">

        ";
        // line 31
        $this->displayBlock('content', $context, $blocks);
        // line 33
        echo "</div>
</div>
";
    }

    // line 31
    public function block_content($context, array $blocks = array())
    {
        // line 32
        echo "        ";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle::layout_app.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 32,  94 => 31,  88 => 33,  86 => 31,  81 => 28,  79 => 27,  61 => 11,  58 => 10,  44 => 6,  40 => 5,  36 => 4,  31 => 3,  28 => 2,  73 => 21,  64 => 19,  60 => 18,  56 => 17,  52 => 8,  48 => 7,  45 => 14,  41 => 13,  29 => 3,  26 => 2,);
    }
}
