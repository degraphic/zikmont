<?php

/* zikmontFrontEndBundle::layout1.html.twig */
class __TwigTemplate_7ed5a990992620cb57bc130c0f6a59a5 extends Twig_Template
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
    <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/reveal.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "    <div id=\"content\">        
        <div class=\"left\">
                ";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "        </div>
    </div>
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "                ";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle::layout1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 10,  55 => 12,  53 => 10,  46 => 7,  40 => 5,  36 => 4,  31 => 3,  28 => 2,  73 => 23,  64 => 11,  60 => 20,  56 => 19,  52 => 18,  49 => 8,  45 => 16,  33 => 7,  29 => 5,  26 => 4,);
    }
}
