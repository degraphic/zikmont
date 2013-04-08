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
        echo "<div class=\"left_articles\">                
    <p class=\"description\"><h2>Detalle del movimiento</h2></p>  

<!-- Encabezado Movimiento -->
<div class=\"div-form\">
    <table>
        <tr>
            <td>Numero</td>
            <td>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "arMovimiento"), "numeroMovimiento"), "html", null, true);
        echo "</td>
            <td>Fecha</td>
            <td>";
        // line 13
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "arMovimiento"), "fecha"), "m/d/Y"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>                
    </table>
</div>
<!-- Fin Encabezado Movimiento -->
estilo
<!-- Menu Encabezado Movimiento -->
<header class=\"jumbotron subhead\" id=\"overview\">
    <div class=\"subnav\">
        <ul class=\"nav nav-pills\">
            <li><a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\">Nuevo</a></li>
            <li><a href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\">Editar</a></li>
            <li><a href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosautorizar", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\">Autorizar</a></li>
            <li><a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdesautorizar", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\">Desautorizar</a></li>
            <li><a href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\">Anular</a></li>
            <li><a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\">Cerrar</a></li>
            <li><a href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\">Abrir</a></li>
            <li><a href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosimprimir", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\">Imprimir</a></li>
        </ul>
    </div>
</header>
<!-- Fin Menu Encabezado Movimiento -->

<!-- F -->
<form action=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosaccionitems", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "objformulario"));
        echo " novalidate>
    <table class=\"table table-striped table-bordered table-condensed\">
        
        <tr>
            <th>ID</th>
            <th>Item</th>
            <th>Descripcion</th>
            
            ";
        // line 51
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "columnaLote") == 1)) {
            // line 52
            echo "                <th>Lote</th>
            ";
        }
        // line 53
        echo "                                        
            
            ";
        // line 55
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "columnaBodega") == 1)) {
            // line 56
            echo "               <th>Bodega</th>
            ";
        }
        // line 57
        echo "                                            
               
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Iva</th>
            <th>Subtotal</th>
            <th>Dcto</th>
            <th>Total</th>
            <th>Enlace</th>
            <th></th>  
        </tr>
       
        ";
        // line 69
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arMovimientosDetalle"));
        foreach ($context['_seq'] as $context["_key"] => $context["movimientoDetalle"]) {
            // line 70
            echo "        <tr>                                                               
             ";
            // line 71
            if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 0)) {
                echo "    
                <td><input type=\"text\" name=\"LblCodigoDetalle[]\" value=\"";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
                echo "\" size=\"5\" readonly=\"true\"/></td> 
                <td>";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimientoDetalle"), "itemMD"), "codigoItemPk"), "html", null, true);
                echo "</td>  
                <td>";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimientoDetalle"), "itemMD"), "descripcion"), "html", null, true);
                echo "</td>  

                ";
                // line 76
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "columnaLote") == 1)) {
                    echo "                        
                <td><input type=\"text\" name=\"TxtLote[]\" value=\"";
                    // line 77
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "loteFk"), "html", null, true);
                    echo "\" size=\"15\"/><li><a href=\"#\" data-reveal-id=\"myModal\" data-animation=\"fade\">Lote</a></li></td>                                                
                    
                ";
                }
                // line 79
                echo "                                                                                                               

                ";
                // line 81
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "columnaBodega") == 1)) {
                    echo "                        
                  <td><input type=\"text\" name=\"TxtBodega[]\" value=\"";
                    // line 82
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoBodegaFk"), "html", null, true);
                    echo "\" size=\"2\"/></td>                                                
                ";
                }
                // line 83
                echo "                                                                                                               
                      
                <td><input type=\"text\" name=\"TxtCantidad[]\" value=\"";
                // line 85
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "cantidad"), "html", null, true);
                echo "\" size=\"5\"/></td> 
                 ";
            } else {
                // line 86
                echo "                                                
                <td>";
                // line 87
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
                echo "</td>                             
                <td>";
                // line 88
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimientoDetalle"), "itemMD"), "codigoItemPk"), "html", null, true);
                echo "</td>  
                <td>";
                // line 89
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimientoDetalle"), "itemMD"), "descripcion"), "html", null, true);
                echo "</td>  

                ";
                // line 91
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "columnaLote") == 1)) {
                    // line 92
                    echo "                    <td>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "loteFk"), "html", null, true);
                    echo "</td>
                ";
                }
                // line 93
                echo "  

                ";
                // line 95
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "arMovimiento"), "documentoRel"), "columnaBodega") == 1)) {
                    echo "                        
                    <td>";
                    // line 96
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoBodegaFk"), "html", null, true);
                    echo "</td>                        
                ";
                }
                // line 97
                echo "                                                                                                                                           

                <td>";
                // line 99
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "cantidad"), "html", null, true);
                echo "</td>                          
             ";
            }
            // line 100
            echo "                                                                 
                    <td>";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "precio"), "html", null, true);
            echo "</td> 
                    <td>";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "porcentajeIva"), "html", null, true);
            echo "</td>  
                    <td>";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "subTotal"), "html", null, true);
            echo "</td>  
                    <td>";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "porcentajeDescuento"), "html", null, true);
            echo "</td>  
                    <td>";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "total"), "html", null, true);
            echo "</td>
                    <td>";
            // line 106
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoEnlace"), "html", null, true);
            echo "</td>                    
                    <td><input type=\"checkbox\" name=\"ChkSeleccionar[]\" value=\"";
            // line 107
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
            echo "\" /></td>                    
                </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movimientoDetalle'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 109
        echo "           
        </table>

        <button class=\"btn\" type=\"submit\" name=\"OpSubmit\" value=\"OpActualizarDetalles\" ";
        // line 112
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 1)) {
            echo " disabled ";
        }
        echo " >Actualizar Detalles</button>
        <button class=\"btn\" type=\"submit\" name=\"OpSubmit\" value=\"OpEliminar\" ";
        // line 113
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 1)) {
            echo " disabled ";
        }
        echo ">Eliminar</button>
        <button class=\"btn\" type=\"submit\" name=\"OpSubmit\" value=\"OpCerrar\" ";
        // line 114
        if (($this->getAttribute($this->getContext($context, "arMovimiento"), "estadoAutorizado") == 0)) {
            echo " disabled ";
        }
        echo ">Cerrar</button>       

        <br /> 

        <br /><br />
        <a href=\"javascript:abrirVentana3('";
        // line 119
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosagregaritem", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "', 'AgregarItems', 600, 900)\">Agregar Item</a> -             
        <a href=\"javascript:abrirVentana3('";
        // line 120
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosagregaritemdocumento", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "', 'AgregarItems', 600, 900)\">Agregar Item de documento</a>                          
        <br /><br />
    </form>       
    <br />            

</div>
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
        return array (  315 => 120,  311 => 119,  301 => 114,  295 => 113,  289 => 112,  284 => 109,  275 => 107,  271 => 106,  267 => 105,  263 => 104,  259 => 103,  255 => 102,  251 => 101,  248 => 100,  243 => 99,  239 => 97,  234 => 96,  230 => 95,  226 => 93,  220 => 92,  218 => 91,  213 => 89,  209 => 88,  205 => 87,  202 => 86,  197 => 85,  193 => 83,  188 => 82,  184 => 81,  180 => 79,  174 => 77,  170 => 76,  165 => 74,  161 => 73,  157 => 72,  153 => 71,  150 => 70,  146 => 69,  132 => 57,  128 => 56,  126 => 55,  122 => 53,  118 => 52,  116 => 51,  103 => 43,  93 => 36,  89 => 35,  85 => 34,  81 => 33,  77 => 32,  73 => 31,  69 => 30,  65 => 29,  46 => 13,  39 => 11,  29 => 3,  26 => 2,);
    }
}
