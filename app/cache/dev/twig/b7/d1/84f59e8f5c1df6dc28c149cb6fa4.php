<?php

/* zikmontFrontEndBundle:Asientos:asientosDetalle.html.twig */
class __TwigTemplate_b7d184f59e8f5c1df6dc28c149cb6fa4 extends Twig_Template
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
        <h1>Detalles del asiento 
            <span class=\"label label-info\">Autorizado</span>
            <small><label id=\"lblNombreDocumento\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "arAsiento"), "asientoTipoRel"), "nombreAsientoTipo"), "html", null, true);
        echo "</label></small>
        </h1>
    </div>      

        <!-- Encabezado Movimiento -->
        <div class=\"well\">
            <table class=\"main-all-table-form\">
                <tr>

                    <td class=\"td-label\">Numero:</td>
                    <td class=\"td-in\" >";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "arAsiento"), "codigoAsientoPk"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "arAsiento"), "numeroAsiento"), "html", null, true);
        echo "</td>

                    <td class=\"td-label\">Fecha:</td>
                    <td class=\"td-in\">";
        // line 21
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "arAsiento"), "fecha"), "Y/m/d"), "html", null, true);
        echo "</td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\" ></td>

                    <td class=\"td-label\">Sub Total:</td>
                    <td class=\"td-in-numerico\" align=\"right\">\$ </td>
                </tr>

                <tr>
                    <td class=\"td-label\">Tercero:</td>
                    <td class=\"td-in\" >";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "arAsiento"), "terceroRel"), "nombreCortoTercero"), "html", null, true);
        echo "</td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\"></td>                

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\" ></td>

                    <td class=\"td-label\">Iva</td>
                    <td class=\"td-in-numerico\" align=\"right\">\$ </td>
                </tr>

                <tr>
                    <td class=\"td-label\">Dirección:</td>
                    <td class=\"td-in\" >";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "arAsiento"), "terceroRel"), "direccion"), "html", null, true);
        echo "</td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\"></td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\" ></td>

                    <td class=\"td-label\">Descuento:</td>
                    <td class=\"td-in-numerico\">\$ </td>                
                </tr>

                <tr>
                    <td class=\"td-label\">Telefono:</td>
                    <td class=\"td-in\" >";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "arAsiento"), "terceroRel"), "telefono"), "html", null, true);
        echo "</td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\"></td>

                    <td class=\"td-label\">Retenciones:</td>
                    <td class=\"td-in-numerico\" align=\"right\">\$ </td>                 


                    <td class=\"td-label\">Rte Fuente:</td>
                    <td class=\"td-in-numerico\" align=\"right\">\$ </td>                

                </tr>

                <tr>
                    <td class=\"td-label\">Asesor:</td>
                    <td class=\"td-in\" ></td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\"></td>

                    <td class=\"td-label\"></td>
                    <td class=\"td-in\" ></td>

                    <td class=\"td-label\">Total:</td>
                    <td class=\"td-in-numerico\" align=\"right\">\$ </td>
                </tr>
            </table>
        </div>
        <!-- Fin Encabezado Movimiento -->

        <hr>

    <!-- Formulario - Tabla -->
    <form action=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("asientosaccionitems", array("codigoAsiento" => $this->getAttribute($this->getContext($context, "arAsiento"), "codigoAsientoPk"))), "html", null, true);
        echo "\" method=\"post\" novalidate>
        <table class=\"table table-striped table-bordered table-condensed\">
            <tr>
                <th></th>
                <th>Enlace</th>
                <th>Precio</th>
                <th>Dcto</th>                
                <th>Cuenta</th>
                <th></th>  
            </tr>
        </table>
    </form>

    <!-- Botones Menu Items -->
    <div class=\"btn-toolbar\" style=\"float: right\">
        <div class=\"btn-group\">
           <a class=\"btn btn-mini\" href=\"#\">Agregar Item</a>             
           <a class=\"btn btn-mini\" href=\"javascript:abrirVentana3('";
        // line 111
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("asientosagregarcuentapagar", array("codigoAsiento" => $this->getAttribute($this->getContext($context, "arAsiento"), "codigoAsientoPk"))), "html", null, true);
        echo "', 'AgregarItems', 600, 900)\">Agregar Item de documento</a>                         
        </div>
        <div class=\"btn-group\">    
            <button class=\"btn btn-mini\" type=\"submit\" name=\"OpSubmit\" value=\"OpCerrar\" >Cerrar</button>       
            <button class=\"btn btn-danger btn-mini\" type=\"submit\" name=\"OpSubmit\" value=\"OpEliminar\" >Eliminar</button>
            <button class=\"btn btn-mini\" type=\"submit\" name=\"OpSubmit\" value=\"OpActualizarDetalles\" >Guardar Cambios</button>
        </div>                   
    </div>                            
    <!-- Fin Botones Menu Items -->     
</div>

";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Asientos:asientosDetalle.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 111,  142 => 94,  105 => 60,  88 => 46,  71 => 32,  57 => 21,  49 => 18,  36 => 8,  29 => 3,  26 => 2,);
    }
}
