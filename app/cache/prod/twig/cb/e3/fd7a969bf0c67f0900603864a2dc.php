<?php

/* ::base.html.twig */
class __TwigTemplate_cbe3fd7a969bf0c67f0900603864a2dc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"shortcut icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        <script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-1.7.2.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.reveal.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/general.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-dropdown.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.jixedbar.min.js"), "html", null, true);
        echo "\"></script>
       ";
        // line 13
        $this->env->loadTemplate("YepsuaSmarTwigBundle::smartwigAssets.html.twig")->display($context);
        // line 14
        echo "    </head>
    <body>
        ";
        // line 16
        $this->displayBlock('body', $context, $blocks);
        // line 17
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 20
        echo "        </body>
    </html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Zikmont C1.0.0!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
    }

    // line 17
    public function block_javascripts($context, array $blocks = array())
    {
        // line 18
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 18,  91 => 17,  86 => 16,  81 => 6,  75 => 5,  69 => 20,  66 => 17,  60 => 14,  58 => 13,  54 => 12,  50 => 11,  46 => 10,  42 => 9,  38 => 8,  33 => 7,  31 => 6,  21 => 1,  89 => 34,  87 => 33,  64 => 16,  61 => 11,  55 => 9,  51 => 8,  47 => 7,  43 => 6,  39 => 5,  35 => 4,  30 => 3,  27 => 5,  29 => 3,  26 => 2,);
    }
}
