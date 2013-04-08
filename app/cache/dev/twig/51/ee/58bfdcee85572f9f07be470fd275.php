<?php

/* zikmontFrontEndBundle:Utilidades/Procesos:regenerarKardex.html.twig */
class __TwigTemplate_51ee58bfdcee85572f9f07be470fd275 extends Twig_Template
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
        echo "<div class=\"left_articles\">                
    <p class=\"description\"><h1>Regenerar Kardex</h1></p> 
<hr/>
<form  action=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("regenerarkardex"), "html", null, true);
        echo "\" method=\"post\">        

    <button type=\"submit\" name=\"register_submit\" id=\"register_submit\" class=\"btn-success\">Regenerar</button><br>

    <span id=\"ayudaProceso\" class=\"badge badge-info\">?</span>

    <div id=\"divAyudaProceso\">
        <div class=\"alert alert-info\">
            <a class=\"close\" data-dismiss=\"alert\" href=\"#\">×</a>
            <h4 class=\"alert-heading\">Regeneración</h4>
            Este proceso debe correrse...
        </div>
    </div>
</form>      


<hr/>

</div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Utilidades/Procesos:regenerarKardex.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 6,  29 => 3,  26 => 2,);
    }
}
