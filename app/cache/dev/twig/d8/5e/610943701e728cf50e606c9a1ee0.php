<?php

/* zikmontFrontEndBundle:Movimientos:movimientosAgregarItem.html.twig */
class __TwigTemplate_d85e610943701e728cf50e606c9a1ee0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("zikmontFrontEndBundle::layout_app_limpio.html.twig");

        $this->blocks = array(
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

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"left_articles\">                
        <!-- Formulario de busqueda -->    
        <form id=\"FrmBusqueda\" action=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosbuscaritem", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\" method=\"POST\" novalidate>
        <div class=\"div-form\">
            <table class=\"main-all-table-form\">
                <tr>                
                    <td class=\"td-label\">Item:</td>
                    <td class=\"td-in\" ><input type=\"text\" class=\"span2\" name=\"TxtCodigoItem\" ";
        // line 10
        if (array_key_exists("Ultima_Codigo", $context)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "Ultimo_Codigo"), "html", null, true);
            echo "\" ";
        }
        echo " onkeypress=\"return validarNumeros(event)\" onclick=\"this.select()\"  size=\"15\"/></td>
                </tr>   
                <tr>                
                    <td class=\"td-label\">Descripcion:</td>
                    <td class=\"td-in\" ><input type=\"text\" class=\"span6\" name=\"TxtDescripcionItem\" ";
        // line 14
        if (array_key_exists("Ultima_Descripcion", $context)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "Ultima_Descripcion"), "html", null, true);
            echo "\" ";
        }
        echo " onclick=\"this.select()\" size=\"15\"/></td></td>
                </tr>
                <tr>                
                    <td></td>
                    <td><button class=\"btn btn-primary\" type=\"submit\" name=\"OpSubmit\" value=\"OpActualizarDetalles\">Buscar</button></td>
                </tr>            
            </table>
        </div>    
        </form>                
        <p class=\"description\"><h2>Agregar item a un movimiento</h2></p>      
        <form id=\"FrmListado\" action=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosagregaritem", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"))), "html", null, true);
        echo "\" method=\"post\">        
        <table class=\"table table-striped table-bordered table-condensed\">
            <tr>
                <th>Item</th>
                <th>Descripcion</th>
                <th>Iva</th>                
                <th>Existencia</th>
                <th>Remisiones</th>
                <th>Disponible</th>
                <th>Cantidad</th>
                <th></th>
            </tr>
            
            ";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arItems"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 38
            echo "            <tr> 
                <td>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "codigoItemPk"), "html", null, true);
            echo "</td>  
                <td>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "descripcion"), "html", null, true);
            echo "</td>
                <td style=\"text-align: right\">";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "porcentajeIva"), "html", null, true);
            echo "</td>
                <td style=\"text-align: right\">";
            // line 42
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "cantidadExistencia"), 0, ".", ","), "html", null, true);
            echo "</td>
                <td style=\"text-align: right\">";
            // line 43
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "cantidadRemisionada"), 0, ".", ","), "html", null, true);
            echo "</td>
                <td style=\"text-align: right\">";
            // line 44
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "cantidadDisponible"), 0, ".", ","), "html", null, true);
            echo "</td>
                <td><input class=\"input-grid\" type=\"text\" name=\"TxtCantidad";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "codigoItemPk"), "html", null, true);
            echo "\" value=\"0\" size=\"5\" style=\"text-align: right\" onkeypress=\"return validarNumeros(event)\" onclick=\"this.select()\" /></td>
                
                <td><input type=\"checkbox\" name=\"ChkSeleccionar[]\" value=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "codigoItemPk"), "html", null, true);
            echo "\" /></td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 49
        echo "                                
        </table>
        
        <div class=\"divDerecho\">
            <button class=\"btn btn-primary\" type=\"submit\" name=\"register_submit\" id=\"register_submit\">Agregar Seleccionados</button><br>
        </div>
        </form>        
    </div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Movimientos:movimientosAgregarItem.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 49,  121 => 47,  116 => 45,  112 => 44,  108 => 43,  104 => 42,  100 => 41,  96 => 40,  92 => 39,  89 => 38,  85 => 37,  69 => 24,  52 => 14,  41 => 10,  33 => 5,  29 => 3,  26 => 2,);
    }
}
