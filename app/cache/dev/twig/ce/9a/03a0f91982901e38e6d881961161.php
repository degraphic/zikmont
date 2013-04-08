<?php

/* zikmontFrontEndBundle:Asientos:asientosLista.html.twig */
class __TwigTemplate_ce9a03a0f91982901e38e6d881961161 extends Twig_Template
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
        echo "    

    <div class=\"page-header\">
        <h1>Lista Asientos: </h1>
    </div>              
    
    <table  class=\"table table-striped table-bordered table-condensed\">

        <tr>
            <th>ID</th>
            <th>Número</th>
            <th>Fecha</th>
            <th>Nit</th>            
            <th>Cliente</th>            
            <th>Comentarios</th>
            <th>Total</th>
            <th></th>
        </tr>

        ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arAsientos"));
        foreach ($context['_seq'] as $context["_key"] => $context["asiento"]) {
            // line 22
            echo "            <tr>
                <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "asiento"), "codigoAsientoPk"), "html", null, true);
            echo "</td>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "asiento"), "numeroAsiento"), 0), "html", null, true);
            echo "</td>
                <td>";
            // line 25
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "asiento"), "fecha"), "Y/m/d"), "html", null, true);
            echo "</td>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "asiento"), "codigoTerceroFk"), "html", null, true);
            echo "</td>  
                <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "asiento"), "terceroRel"), "nombreCortoTercero"), "html", null, true);
            echo "</td>  
                <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "asiento"), "comentarios"), "html", null, true);
            echo "</td>
                <td></td>            
                <td style=\"text-align: center\"><a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("asientosdetalle", array("codigoAsiento" => $this->getAttribute($this->getContext($context, "asiento"), "codigoAsientoPk"))), "html", null, true);
            echo "\"><IMG SRC=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/imagenes/tema1/glyphicons_152_new_window.png"), "html", null, true);
            echo "\" WIDTH=20 HEIGHT=20></a></td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['asiento'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 32
        echo "            

    </table>        
    <hr/>
    
    <a href=\"#\" data-reveal-id=\"nuevoMovimientoModal\" data-animation=\"fade\">Nuevo</a>                       
              
</div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Asientos:asientosLista.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 32,  81 => 30,  76 => 28,  72 => 27,  68 => 26,  64 => 25,  60 => 24,  56 => 23,  53 => 22,  49 => 21,  26 => 2,);
    }
}
