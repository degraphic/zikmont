<?php

/* zikmontFrontEndBundle:Movimientos:movimientosDetalle.html.twig */
class __TwigTemplate_a7c1cca6e5ccbd98ece075c5aaa82408 extends Twig_Template
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
<div class=\"left_articles\">
    <div class=\"page-header\">
        <h1>Detalles del movimiento 
            ";
        // line 7
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 1)) {
            echo " <span class=\"label label-info\">Autorizado</span> ";
        }
        echo " 
            ";
        // line 8
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoCerrado") == 1)) {
            echo " <span class=\"label label-info\">Cerrado</span> ";
        }
        // line 9
        echo "            ";
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoImpreso") == 1)) {
            echo " <span class=\"label label-info\">Impreso</span> ";
        }
        echo "            
                <small><label id=\"lblNombreDocumento\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "arDocumento"), "nombreDocumento"), "html", null, true);
        echo "</label></small>
            </h1>
        </div>      

        <!-- Encabezado Movimiento -->
        <div class=\"well\">
            <table class=\"main-all-table-form\">
                <tr>

                    <td class=\"td-label\">Numero:</td>
                    <td class=\"td-in\" >";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "arMovimiento"), "numeroMovimiento"), "html", null, true);
        echo "</td>

                    <td class=\"td-label\">Fecha:</td>
                    <td class=\"td-in\">";
        // line 23
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "arMovimiento"), "fecha"), "Y/m/d"), "html", null, true);
        echo "</td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\" ></td>

                    <td class=\"td-label\">Sub Total:</td>
                    <td class=\"td-in-numerico\" align=\"right\">\$ ";
        // line 29
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "arMovimiento"), "subtotal"), 2, ".", ","), "html", null, true);
        echo "</td>
                </tr>

                <tr>
                    <td class=\"td-label\">Tercero:</td>
                    <td class=\"td-in\" >";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "terceroRel"), "nombreCortoTercero"), "html", null, true);
        echo "</td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\"></td>                

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\" ></td>

                    <td class=\"td-label\">Iva</td>
                    <td class=\"td-in-numerico\" align=\"right\">\$ ";
        // line 43
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "arMovimiento"), "valorTotalIva"), 2, ".", ","), "html", null, true);
        echo "</td>
                </tr>

                <tr>
                    <td class=\"td-label\">Dirección:</td>
                    <td class=\"td-in\" >";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "terceroRel"), "direccion"), "html", null, true);
        echo "</td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\"></td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\" ></td>

                    <td class=\"td-label\">Descuento:</td>
                    <td class=\"td-in-numerico\">\$ ";
        // line 57
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "arMovimiento"), "valorTotalDescuento"), 2, ".", ","), "html", null, true);
        echo "</td>                
                </tr>

                <tr>
                    <td class=\"td-label\">Telefono:</td>
                    <td class=\"td-in\" >";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "terceroRel"), "telefono"), "html", null, true);
        echo "</td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\"></td>

                    <td class=\"td-label\">Retenciones:</td>
                    <td class=\"td-in-numerico\" align=\"right\">\$ ";
        // line 68
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "arMovimiento"), "valorOtrasRetenciones"), 2, ".", ","), "html", null, true);
        echo "</td>                 


                    <td class=\"td-label\">Rte Fuente:</td>
                    <td class=\"td-in-numerico\" align=\"right\">\$ ";
        // line 72
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "arMovimiento"), "valorRetencionFuente"), 2, ".", ","), "html", null, true);
        echo "</td>                

                </tr>

                <tr>
                    <td class=\"td-label\">Asesor:</td>
                    <td class=\"td-in\" ></td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\"></td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\" ></td>

                    <td class=\"td-label\">Total:</td>
                    <td class=\"td-in-numerico\" align=\"right\">\$ ";
        // line 87
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "arMovimiento"), "total"), 2, ".", ","), "html", null, true);
        echo "</td>
                </tr>
            </table>
        </div>
        <!-- Fin Encabezado Movimiento -->

        <hr>

    <!-- Menu Encabezado Movimiento -->
    ";
        // line 96
        echo $this->env->getExtension('actions')->renderAction("zikmontFrontEndBundle:TopMenuDetalles:documentos", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk")), array());
        // line 97
        echo "    <!-- Fin Menu Encabezado Movimiento -->

    

</div>

<!--Tabla de otros Conceptos -->
 <h2>Otros Conceptos <small><label id=\"lblNombreDocumento\">Retenciones</label></small></h2>
    <!-- tabla de retenciones -->
    <table class=\"table table-striped table-bordered table-condensed\">
        <tr>
            <th>ID</th>
            <th>Concepto</th>
            <th>Base</th>
            <th>%</th>
            <th>Valor</th>
        </tr> 
";
        // line 114
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arMovimientosRetenciones"));
        foreach ($context['_seq'] as $context["_key"] => $context["movimientoRetencion"]) {
            // line 115
            echo "        <tr> 
            <td>";
            // line 116
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoRetencion"), "codigoMovimientoRetencionPk"), "html", null, true);
            echo "</td>
            <td>";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimientoRetencion"), "conceptoRetencionRel"), "nombreConceptoRetencion"), "html", null, true);
            echo "</td>
            <td style=\"text-align: right\">";
            // line 118
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoRetencion"), "baseRetencion"), 2, ".", ","), "html", null, true);
            echo "</td>
            <td style=\"text-align: right\">";
            // line 119
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoRetencion"), "porcentajeRetencion"), 2, ".", ","), "html", null, true);
            echo "</td>
            <td style=\"text-align: right\">";
            // line 120
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoRetencion"), "valorTotalRetencion"), 2, ".", ","), "html", null, true);
            echo "</td>
        </tr>    
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movimientoRetencion'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 123
        echo "    </table>
<!--Fin tabla de otros Conceptos -->

<!-- Formulario de nuevo -->
";
        // line 127
        echo $this->env->getExtension('actions')->renderAction("zikmontFrontEndBundle:MovimientosNuevo:movimientosnuevo", array("codigoDocumento" => $this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "codigoDocumentoPK")), array());
        echo "        

";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Movimientos:movimientosDetalle.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  235 => 127,  229 => 123,  220 => 120,  216 => 119,  212 => 118,  208 => 117,  204 => 116,  201 => 115,  197 => 114,  178 => 97,  176 => 96,  164 => 87,  146 => 72,  139 => 68,  130 => 62,  122 => 57,  110 => 48,  102 => 43,  90 => 34,  82 => 29,  73 => 23,  65 => 20,  52 => 10,  45 => 9,  41 => 8,  35 => 7,  29 => 3,  26 => 2,);
    }
}
