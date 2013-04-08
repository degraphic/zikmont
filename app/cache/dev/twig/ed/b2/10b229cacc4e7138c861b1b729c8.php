<?php

/* zikmontFrontEndBundle:Plantillas:topmenudetalles.html.twig */
class __TwigTemplate_edb210b229cacc4e7138c861b1b729c8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- Menu Encabezado Movimiento -->
<div id=\"detalles\">
<header id=\"overview\" class=\"jumbotron subhead\" >
            <div class=\"subnav\">
                <ul class=\"nav nav-pills\">
                    <li><a href=\"#\" data-reveal-id=\"nuevoMovimientoModal\" data-animation=\"fade\">Nuevo</a></li>
                    <li><a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\">Editar</a></li>
                ";
        // line 8
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 1)) {
            echo "<li class=\"active\"> ";
        } else {
            echo " <li> ";
        }
        // line 9
        echo "                        <a id=\"autorizar\" href=\"#\">Autorizar</a></li>
                ";
        // line 10
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 0)) {
            echo "<li class=\"active\"> ";
        } else {
            echo " <li> ";
        }
        // line 11
        echo "                    <a id=\"desautorizar\" href=\"#\">Desautorizar</a></li>
                ";
        // line 12
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 0)) {
            echo "<li class=\"active\"> ";
        } else {
            echo " <li> ";
        }
        // line 13
        echo "                <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\">Anular</a></li>
                ";
        // line 14
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 0)) {
            echo "<li class=\"active\"> ";
        } else {
            echo " <li> ";
        }
        // line 15
        echo "            <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\">Cerrar</a></li>
                ";
        // line 16
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 0)) {
            echo "<li class=\"active\"> ";
        } else {
            echo " <li> ";
        }
        // line 17
        echo "        <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\">Abrir</a></li>
    <li><a id=\"imprimir\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosimprimir", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\">Imprimir</a></li>
</ul>
</div>
</header>

<!-- Formulario - Tabla -->
<form action=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosaccionitems", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\" method=\"post\" novalidate>
        <table class=\"table table-striped table-bordered table-condensed\">
            <tr>
                <th></th>
                <th>Item</th>
                <th>Descripcion</th>

            ";
        // line 31
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "columnaLote") == 1)) {
            // line 32
            echo "                <th>Lote</th>
                <th>Vencimiento</th>
            ";
        }
        // line 34
        echo "                                        

            ";
        // line 36
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "columnaBodega") == 1)) {
            // line 37
            echo "                <th>Bodega</th>
            ";
        }
        // line 38
        echo "                                            

                <th>Cantidad</th>
                <th>Dcto</th>
                <th>Pendiente</th>
                <th>Precio</th>
                <th>Iva</th>
                <th>Subtotal</th>
                <th>Total</th>
                <th>Enlace</th>
                <th></th>  
            </tr>

        ";
        // line 51
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arMovimientosDetalle"));
        foreach ($context['_seq'] as $context["_key"] => $context["movimientoDetalle"]) {
            // line 52
            echo "            <tr>                                                               
            ";
            // line 53
            if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 0)) {
                echo "    
                    <td><input type=\"hidden\" name=\"LblCodigoDetalle[]\" value=\"";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
                echo "\"><span class=\"badge\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
                echo "</span></td> 
                    <td>";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimientoDetalle"), "itemMD"), "codigoItemPk"), "html", null, true);
                echo "</td>  
                    <td>";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimientoDetalle"), "itemMD"), "descripcion"), "html", null, true);
                echo "</td>  

                ";
                // line 58
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "columnaLote") == 1)) {
                    // line 59
                    echo "                    ";
                    if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "operacionInventario") == (-1))) {
                        // line 60
                        echo "                    <td>
                        <input style=\"width:80px\" type=\"text\" id=\"TxtLote[";
                        // line 61
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
                        echo "]\" name=\"TxtLote[]\" value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "loteFk"), "html", null, true);
                        echo "\" size=\"15\" readonly=\"true\"/>
                        <a href=\"javascript:abrirVentana3('";
                        // line 62
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosagregarlote", array("codigoMovimientoDetalle" => $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"))), "html", null, true);
                        echo "', 'AgregarLote', 600, 900)\" ><IMG SRC=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/imagenes/tema1/glyphicons_090_table.png"), "html", null, true);
                        echo "\" WIDTH=18 HEIGHT=18></a>
                    </td>  
                    <td><input style=\"width:80px\" type=\"text\"  id=\"TxtVencimiento[";
                        // line 64
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
                        echo "]\" name=\"TxtVencimiento[]\" value=\"";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "fechaVencimiento"), "Y/m/d"), "html", null, true);
                        echo "\" size=\"15\" readonly=\"true\"/></td>  

                    ";
                    } else {
                        // line 66
                        echo "                
                    <td><input style=\"width:80px\" type=\"text\"  id=\"TxtLote[";
                        // line 67
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
                        echo "]\" name=\"TxtLote[]\" value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "loteFk"), "html", null, true);
                        echo "\" size=\"15\"/></td>                                                                
                    <td><input style=\"width:80px\" type=\"text\" id=\"TxtVencimiento[";
                        // line 68
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
                        echo "]\" name=\"TxtVencimiento[]\" value=\"";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "fechaVencimiento"), "Y/m/d"), "html", null, true);
                        echo "\" size=\"15\"/></td>       
                    ";
                    }
                    // line 69
                    echo "                
                ";
                }
                // line 71
                echo "
                ";
                // line 72
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "columnaBodega") == 1)) {
                    echo "                        
                    ";
                    // line 73
                    if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "operacionInventario") == (-1))) {
                        // line 74
                        echo "                        <td><input type=\"text\" name=\"TxtBodega[]\" id=\"TxtBodega[";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
                        echo "]\"   value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoBodegaFk"), "html", null, true);
                        echo "\" size=\"2\"  readonly=\"true\"/></td>                                                                    
                    ";
                    } else {
                        // line 75
                        echo "              
                            <td><input type=\"text\" name=\"TxtBodega[]\" onkeypress=\"return validarNumeros(event)\" id=\"TxtBodega[";
                        // line 76
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
                        echo "]\" value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoBodegaFk"), "html", null, true);
                        echo "\" size=\"2\"/></td>                                                                    
                    ";
                    }
                    // line 78
                    echo "                ";
                }
                echo "                                                                                                               
                                <td><input type=\"text\" name=\"TxtCantidad[]\" onkeypress=\"return validarNumeros(event)\" value=\"";
                // line 79
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "cantidad"), "html", null, true);
                echo "\" size=\"5\"/></td> 
                                <td><input type=\"text\" name=\"TxtDescuento[]\" onkeypress=\"return validarNumeros(event)\" value=\"";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "porcentajeDescuento"), "html", null, true);
                echo "\" size=\"5\"/></td> 
            ";
            } else {
                // line 81
                echo "                                                
                                    <td><span class=\"badge\">";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
                echo "</span></td>                             
                                    <td>";
                // line 83
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimientoDetalle"), "itemMD"), "codigoItemPk"), "html", null, true);
                echo "</td>  
                                    <td>";
                // line 84
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimientoDetalle"), "itemMD"), "descripcion"), "html", null, true);
                echo "</td>  

                ";
                // line 86
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "columnaLote") == 1)) {
                    // line 87
                    echo "                                    <td>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "loteFk"), "html", null, true);
                    echo "</td>
                                    <td>";
                    // line 88
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "fechaVencimiento"), "Y/m/d"), "html", null, true);
                    echo "</td>
                ";
                }
                // line 89
                echo "  

                ";
                // line 91
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "columnaBodega") == 1)) {
                    echo "                        
                                    <td>";
                    // line 92
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoBodegaFk"), "html", null, true);
                    echo "</td>                        
                ";
                }
                // line 93
                echo "                                                                                                                                           

                                    <td style=\"text-align: right\">";
                // line 95
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "cantidad"), 0, ".", ","), "html", null, true);
                echo "</td>  
                                    <td style=\"text-align: right\">";
                // line 96
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "porcentajeDescuento"), 0, ".", ","), "html", null, true);
                echo "</td>  
            ";
            }
            // line 97
            echo " 
                                    <td style=\"text-align: right\">";
            // line 98
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getContext($context, "movimientoDetalle"), "cantidad") - $this->getAttribute($this->getContext($context, "movimientoDetalle"), "cantidadAfectada")), "html", null, true);
            echo "</td>                 
                                    <td style=\"text-align: right\">";
            // line 99
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "precio"), 2, ".", ","), "html", null, true);
            echo "</td> 
                                    <td style=\"text-align: right\">";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "porcentajeIva"), "html", null, true);
            echo "</td>  
                                    <td style=\"text-align: right\">";
            // line 101
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "subTotal"), 2, ".", ","), "html", null, true);
            echo "</td>              
                                    <td style=\"text-align: right\">";
            // line 102
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "total"), 2, ".", ","), "html", null, true);
            echo "</td>
                                    <td>";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoEnlace"), "html", null, true);
            echo "</td>                    
                                    <td><input type=\"checkbox\" name=\"ChkSeleccionar[]\" value=\"";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
            echo "\" /></td>                    
                                </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movimientoDetalle'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 106
        echo "           
                            </table>
                            <!-- Botones Menu Items -->
                            <div class=\"btn-toolbar\" style=\"float: right\">
                                <div class=\"btn-group\">

                                    <a class=\"btn btn-mini\"
                ";
        // line 113
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 0)) {
            echo " 
                                       href=\"javascript:abrirVentana3('";
            // line 114
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosagregaritem", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
            echo "', 'AgregarItems', 600, 900)\"  
                ";
        } else {
            // line 116
            echo "                                       href=\"#\"  
                ";
        }
        // line 118
        echo "                ";
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 1)) {
            echo " disabled ";
        }
        echo ">Agregar Item</a>             

                                       <a class=\"btn btn-mini\"
                ";
        // line 121
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 0)) {
            echo " 
                                          href=\"javascript:abrirVentana3('";
            // line 122
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosagregaritemdocumento", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
            echo "', 'AgregarItems', 600, 900)\"
                ";
        } else {
            // line 124
            echo "                                          href=\"#\"  
                ";
        }
        // line 126
        echo "                ";
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 1)) {
            echo " disabled ";
        }
        echo ">Agregar Item de documento</a>                         
                                       </div>
                                       <div class=\"btn-group\">    
                                           <button class=\"btn btn-mini\" type=\"submit\" name=\"OpSubmit\" value=\"OpCerrar\" ";
        // line 129
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 0)) {
            echo " disabled ";
        }
        echo ">Cerrar</button>       
                                           <button class=\"btn btn-danger btn-mini\" type=\"submit\" name=\"OpSubmit\" value=\"OpEliminar\" ";
        // line 130
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 1)) {
            echo " disabled ";
        }
        echo ">Eliminar</button>
                                           <button class=\"btn btn-mini\" type=\"submit\" name=\"OpSubmit\" value=\"OpActualizarDetalles\" ";
        // line 131
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 1)) {
            echo " disabled ";
        }
        echo " >Guardar Cambios</button>
                                       </div>                   
                                        <div class=\"btn-group\"> 
                                            <a class=\"btn btn-mini\" href=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientoslista", array("codigoDocumento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoDocumentoFk"))), "html", null, true);
        echo "\">Volver</a>             
                                        </div>
                                    </div>                            
                                    <!-- Fin Botones Menu Items -->                                                      

                                    <br/><br/>
                                    <hr/>
</div>

";
        // line 143
        $this->displayBlock('javascripts', $context, $blocks);
    }

    public function block_javascripts($context, array $blocks = array())
    {
        // line 144
        echo "<script>

\$(document).ready(function(){
        
        \$('#autorizar').live('click',function(){ 
           \$('#detalles').load('";
        // line 149
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosautorizar", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "'); 
           return false;
        });
        
        \$('#desautorizar').live('click',function(){ 
           \$('#detalles').load('";
        // line 154
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdesautorizar", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "'); 
           return false;
        });
});

</script>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Plantillas:topmenudetalles.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  444 => 154,  436 => 149,  429 => 144,  423 => 143,  411 => 134,  403 => 131,  397 => 130,  391 => 129,  382 => 126,  378 => 124,  373 => 122,  369 => 121,  360 => 118,  356 => 116,  351 => 114,  347 => 113,  338 => 106,  329 => 104,  325 => 103,  321 => 102,  317 => 101,  313 => 100,  309 => 99,  305 => 98,  302 => 97,  297 => 96,  293 => 95,  289 => 93,  284 => 92,  280 => 91,  276 => 89,  271 => 88,  266 => 87,  264 => 86,  259 => 84,  255 => 83,  251 => 82,  248 => 81,  243 => 80,  239 => 79,  234 => 78,  227 => 76,  224 => 75,  216 => 74,  214 => 73,  210 => 72,  207 => 71,  203 => 69,  196 => 68,  190 => 67,  187 => 66,  179 => 64,  172 => 62,  166 => 61,  163 => 60,  160 => 59,  158 => 58,  153 => 56,  149 => 55,  143 => 54,  139 => 53,  136 => 52,  132 => 51,  117 => 38,  113 => 37,  111 => 36,  107 => 34,  102 => 32,  100 => 31,  90 => 24,  81 => 18,  76 => 17,  70 => 16,  65 => 15,  59 => 14,  54 => 13,  48 => 12,  45 => 11,  39 => 10,  36 => 9,  30 => 8,  26 => 7,  18 => 1,);
    }
}
