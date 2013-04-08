<?php

/* zikmontFrontEndBundle:Configuraciones:configuraciones.html.twig */
class __TwigTemplate_53db9ff399e2ff3d80b4158a624f0e11 extends Twig_Template
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

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "    <div class=\"left_articles\">                
        <p class=\"description\"><h2>Configuraciones</h2></p>              
        <table class=\"ztable\">
            
            
        </table>        
        <br />
       
    </div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Configuraciones:configuraciones.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 5,  26 => 4,);
    }
}
