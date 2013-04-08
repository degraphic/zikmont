<?php

/* zikmontFrontEndBundle:Movimientos:movimientosPendientes.html.twig */
class __TwigTemplate_2ca087bea60dd7d0f1e52e22a8eb58b9 extends Twig_Template
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
        <h1>Movimientos pendientes: </h1>
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
            <th>Detalles</th>
            <th>Detalles Pendientes</th>
        </tr>

        ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arMovimientos"));
        foreach ($context['_seq'] as $context["_key"] => $context["movimiento"]) {
            // line 23
            echo "
        <tr>
            <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"), "html", null, true);
            echo "</td>
            <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "numeroMovimiento"), 0), "html", null, true);
            echo "</td>
            <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "fecha"), "Y/m/d"), "html", null, true);
            echo "</td>
            <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "codigoTerceroFk"), "html", null, true);
            echo "</td>  
            <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimiento"), "terceroRel"), "nombreCortoTercero"), "html", null, true);
            echo "</td>  
            <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "comentarios"), "html", null, true);
            echo "</td>
            <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "subtotal"), 2, ".", ","), "html", null, true);
            echo "</td>            
            <td style=\"text-align: center\"><a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"))), "html", null, true);
            echo "\"><IMG SRC=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/imagenes/tema1/glyphicons_152_new_window.png"), "html", null, true);
            echo "\" WIDTH=20 HEIGHT=20></a></td>
            <td style=\"text-align: center\"><a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientospendientesdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"))), "html", null, true);
            echo "\"><IMG SRC=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/imagenes/tema1/glyphicons_152_new_window.png"), "html", null, true);
            echo "\" WIDTH=20 HEIGHT=20></a></td>
        </tr>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movimiento'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 36
        echo "            

    </table>        
    <br />               
</div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Movimientos:movimientosPendientes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 36,  92 => 33,  86 => 32,  82 => 31,  78 => 30,  74 => 29,  70 => 28,  66 => 27,  62 => 26,  58 => 25,  54 => 23,  50 => 22,  26 => 2,);
    }
}
