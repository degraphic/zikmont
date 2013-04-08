<?php

/* zikmontFrontEndBundle::layout_app.html.twig */
class __TwigTemplate_2b603077846c8191264aa3966d0caa17 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("zikmontFrontEndBundle::layout_app_limpio.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "zikmontFrontEndBundle::layout_app_limpio.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "
";
        // line 6
        echo $this->env->getExtension('actions')->renderAction("zikmontFrontEndBundle:Menu:documentos", array(), array());
        // line 7
        echo "
<div class=\"container\">
    
    <div id=\"mensaje\"></div>  
    
    <div id=\"mensaje2\" style=\"display: none\"></div>
    
    ";
        // line 14
        $this->displayBlock('content', $context, $blocks);
        // line 17
        echo "</div>           
";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "
    ";
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
        return array (  54 => 15,  51 => 14,  46 => 17,  44 => 14,  35 => 7,  33 => 6,  30 => 5,  27 => 4,);
    }
}
