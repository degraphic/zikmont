<?php

/* zikmontFrontEndBundle:Movimientos:movimientosLista.html.twig */
class __TwigTemplate_c51770e269638612f6bdbb5a3026481e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("zikmontFrontEndBundle::layout_app.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
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
";
        // line 4
        $this->displayBlock('javascripts', $context, $blocks);
        // line 11
        echo "
    <div class=\"page-header\">
        <h1>Lista Movimientos: <input name=\"idocumento\" type=\"hidden\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "arDocumento"), "codigoDocumentoPK"), "html", null, true);
        echo "\" /><small><label id=\"lblNombreDocumento\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "arDocumento"), "nombreDocumento"), "html", null, true);
        echo "</label></small></h1>
    </div>              
    <form action=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosaccionencabezado", array("codigoDocumento" => $this->getAttribute($this->getContext($context, "arDocumento"), "codigoDocumentoPK"))), "html", null, true);
        echo "\" method=\"post\" novalidate>
        <table  class=\"table table-striped table-bordered table-condensed\">
            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Fecha</th>
                <th>Nit</th>            
                <th>Cliente</th>            
                <th>Comentarios</th>
                <th>Total</th>
                <th>Estado</th>
                <th></th>
                <th></th>
            </tr>

            ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arMovimientos"));
        foreach ($context['_seq'] as $context["_key"] => $context["movimiento"]) {
            // line 31
            echo "
            <tr>
                <td><input type=\"hidden\" name=\"LblCodigoMovimiento[]\" value=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"), "html", null, true);
            echo " </td>
                <td>";
            // line 34
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "numeroMovimiento"), 0), "html", null, true);
            echo "</td>
                <td>";
            // line 35
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "fecha"), "Y/m/d"), "html", null, true);
            echo "</td>
                <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "codigoTerceroFk"), "html", null, true);
            echo "</td>  
                <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimiento"), "terceroRel"), "nombreCortoTercero"), "html", null, true);
            echo "</td>  
                <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "comentarios"), "html", null, true);
            echo "</td>
                <td style=\"text-align: right\">";
            // line 39
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "subtotal"), 2, ".", ","), "html", null, true);
            echo "</td>            
                <td>                
                    ";
            // line 41
            if (($this->getAttribute($this->getContext($context, "movimiento"), "estadoAutorizado") == 1)) {
                echo " <span class=\"label label-info\">Aut</span> ";
            }
            echo " 
                    ";
            // line 42
            if (($this->getAttribute($this->getContext($context, "movimiento"), "estadoImpreso") == 1)) {
                echo " <span class=\"label label-info\">Imp</span> ";
            }
            echo "                     
                </td>                
                <td style=\"text-align: center\"><a href=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"))), "html", null, true);
            echo "\"><IMG SRC=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/imagenes/tema1/glyphicons_152_new_window.png"), "html", null, true);
            echo "\" WIDTH=20 HEIGHT=20></a></td>
                <td><input type=\"checkbox\" name=\"ChkSeleccionar[]\" value=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"), "html", null, true);
            echo "\" /></td>            
            </tr>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movimiento'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 48
        echo "            

        </table>        
        
        <!-- Botones Menu Items -->
        <div class=\"btn-toolbar\" style=\"float: right\">
            <div class=\"btn-group\">    
                <a class=\"btn btn-mini\" href=\"#\" data-reveal-id=\"nuevoMovimientoModal\" data-animation=\"fade\">Nuevo</a>
                <button class=\"btn btn-mini\" type=\"submit\" name=\"OpSubmit\" value=\"OpAutorizar\" >Autorizar</button>       
                <button class=\"btn btn-mini\" type=\"submit\" name=\"OpSubmit\" value=\"OpDesActualizar\" >Desautorizar</button>
                <button class=\"btn btn-mini\" type=\"submit\" name=\"OpSubmit\" value=\"OpImprimir\" >Imprimir</button>
                <button class=\"btn btn-danger btn-mini\" type=\"submit\" name=\"OpSubmit\" value=\"OpEliminar\" >Eliminar</button>

            </div>                   
        </div>                            
        <!-- Fin Botones Menu Items -->         
    </form> 
    <br /><br />
    <hr/>
   
    <!-- Formulario de busqueda -->    
    <form id=\"FrmBusqueda\" action=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientoslista", array("codigoDocumento" => $this->getAttribute($this->getContext($context, "arDocumento"), "codigoDocumentoPK"))), "html", null, true);
        echo "\" method=\"POST\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "objformulario"));
        echo " novalidate>
    <div class=\"div-form\">
        <table class=\"main-all-table-form\">
            <tr>                
                <td class=\"td-label\">Movimiento:</td>
                <td class=\"td-in\" ><input class=\"span1\" name=\"TxtCodigoMovimiento\" onkeypress=\"return validarNumeros(event)\" type=\"text\" size=\"15\"/></td>
            </tr>   
            <tr>                
                <td class=\"td-label\">Numero:</td>
                <td class=\"td-in\" ><input class=\"span1\" name=\"TxtNumeroMovimiento\" onkeypress=\"return validarNumeros(event)\" type=\"text\" size=\"15\"/></td></td>
            </tr>
            <tr>                
                <td class=\"td-label\">Tercero:</td>
                <td class=\"td-in\" ><input class=\"span5\" name=\"TxtCodigoTercero\" onkeypress=\"return validarNumeros(event)\" type=\"text\" size=\"15\"/></td>
            </tr>
            <tr>                
                <td class=\"td-label\"></td>
                <td class=\"td-in\" >
                    <span class=\"help-inline\">
                        <label class=\"checkbox inline\"><input type=\"checkbox\" text=\"Autorizado\" name = \"ChkAutorizado\"/> Autorizado</label>
                        <label class=\"checkbox inline\"><input type=\"checkbox\" text=\"Cerrado\" name = \"ChkCerrado\"/> Cerrado</label>
                    </span>                
                </td>
            </tr>            

            <tr>                
                <td class=\"td-label\">Fecha:</td>
                <td class=\"td-in\" >Desde<input class=\"span2\" type=\"text\" name=\"TxtFechaDesde\" id=\"FechaDesde\"/> Hasta <input class=\"span2\" type=\"text\" name=\"TxtFechaHasta\" id=\"FechaHasta\"/></td>
            </tr>             
            <tr>                
                <td></td>
                <td class=\"td-in\" ><button class=\"btn btn-primary\" type=\"submit\" name=\"OpSubmit\" value=\"OpActualizarDetalles\">Buscar</button></td>
            </tr>            
        </table>
        </form>  
        <!-- Fin formulario de busqueda -->
        
        <!-- Formulario de nuevo -->
        ";
        // line 107
        echo $this->env->getExtension('actions')->renderAction("zikmontFrontEndBundle:MovimientosNuevo:movimientosnuevo", array("codigoDocumento" => $this->getAttribute($this->getContext($context, "arDocumento"), "codigoDocumentoPK")), array());
        echo "        
        
    </div>    
              
</div>
";
    }

    // line 4
    public function block_javascripts($context, array $blocks = array())
    {
        // line 5
        echo "<script>
        function validarTercero(codigotercero) {
                \$('#divtercero').load('";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientoslista", array("codigoDocumento" => $this->getAttribute($this->getContext($context, "arDocumento"), "codigoDocumentoPK"))), "html", null, true);
        echo "');
        }\t        
</script>      
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Movimientos:movimientosLista.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 7,  211 => 5,  208 => 4,  198 => 107,  155 => 69,  132 => 48,  122 => 45,  116 => 44,  109 => 42,  103 => 41,  98 => 39,  94 => 38,  90 => 37,  86 => 36,  82 => 35,  78 => 34,  72 => 33,  68 => 31,  64 => 30,  46 => 15,  39 => 13,  35 => 11,  33 => 4,  30 => 3,  27 => 2,);
    }
}
