<?php

/* zikmontFrontEndBundle::layout_app_limpio.html.twig */
class __TwigTemplate_6c32ca8b90b3a934ef913592db86ffb2 extends Twig_Template
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
<link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/pro_dropdown_2.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />

<link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/UI/Datepicker.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />

";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        echo "<div id=\"myModal\" class=\"reveal-modal\">
    <h1>Cerrar Sesión</h1>
    <hr>

    <p>Recuerde cambiar su contraseña periodicamente...</p>

    <input class=\"btn btn-primary\" type=\"submit\" value=\"Aceptar\" />
    <input class=\"btn\" type=\"submit\" class=\"close-reveal-modal\" value=\"Cancelar\" />

    <hr>

    <a class=\"close-reveal-modal\">&#215;</a>
</div>

<div class=\"container\">          
    ";
        // line 33
        echo $this->env->getExtension('actions')->renderAction("zikmontFrontEndBundle:Mensajes:mostrar", array(), array());
        echo "    
    ";
        // line 34
        $this->displayBlock('content', $context, $blocks);
        // line 37
        echo "</div>
";
    }

    // line 34
    public function block_content($context, array $blocks = array())
    {
        // line 35
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle::layout_app_limpio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 35,  102 => 37,  100 => 34,  96 => 33,  79 => 18,  76 => 17,  69 => 13,  64 => 11,  60 => 10,  56 => 9,  48 => 7,  40 => 5,  36 => 4,  31 => 3,  28 => 2,  52 => 8,  49 => 12,  44 => 6,  42 => 12,  267 => 7,  263 => 5,  260 => 4,  250 => 124,  207 => 86,  187 => 68,  181 => 65,  178 => 64,  176 => 63,  172 => 61,  153 => 56,  149 => 55,  146 => 54,  129 => 53,  117 => 43,  107 => 34,  101 => 39,  97 => 38,  93 => 37,  89 => 36,  85 => 35,  81 => 34,  77 => 33,  71 => 32,  67 => 30,  63 => 29,  46 => 15,  39 => 13,  35 => 7,  33 => 6,  30 => 5,  27 => 4,);
    }
}
