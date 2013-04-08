<?php

/* zikmontFrontEndBundle:Movimientos:movimientosdocumentocontroldetalle.html.twig */
class __TwigTemplate_c8ea96acb1152c55479ff8efd125a65c extends Twig_Template
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

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"left_articles\">                
        <p class=\"description\"><h2>Seleccione los items</h2></p>          
        <form  action=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosagregaritemdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "arMovimiento"), "codigoMovimientoPk"), "codigoMovimientoOrigen" => $this->getContext($context, "intCodigoMovimientoOrigen"))), "html", null, true);
        echo "\" method=\"post\" novalidate>
            <table class=\"ztable\">
                <tr>
                    <th>ID</th>
                    <th>Item</th>
                    <th>Descripcion</th>                    
                    <th>Lote</th>
                    <th>Bodega</th>                                                       
                    <th>Precio</th>
                    <th>Iva</th>
                    <th>Subtotal</th>
                    <th>Dcto</th>
                    <th>Total</th>
                    <th>Cantidad</th>
                    <th></th>  
                </tr>
                ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arMovimientosDetalle"));
        foreach ($context['_seq'] as $context["_key"] => $context["movimientoDetalle"]) {
            // line 23
            echo "                <tr>                                                                              
                    <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
            echo "</td>  
                    <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimientoDetalle"), "itemMD"), "codigoItemPk"), "html", null, true);
            echo "</td>  
                    <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimientoDetalle"), "itemMD"), "descripcion"), "html", null, true);
            echo "</td>                              
                    <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "loteFk"), "html", null, true);
            echo "</td>                                                   
                    <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoBodegaFk"), "html", null, true);
            echo "</td>                                                    
                    
                    <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "precio"), "html", null, true);
            echo "</td> 
                    <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "porcentajeIva"), "html", null, true);
            echo "</td>  
                    <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "subTotal"), "html", null, true);
            echo "</td>  
                    <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "porcentajeDescuento"), "html", null, true);
            echo "</td>  
                    <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "total"), "html", null, true);
            echo "</td>     
                    <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "cantidad"), "html", null, true);
            echo "</td>                    
                    <td><input type=\"checkbox\" name=\"ChkSeleccionar[]\" value=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
            echo "\" /></td>                    
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movimientoDetalle'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 38
        echo "            
            </table>
            <br />
            <button type=\"submit\" name=\"register_submit\" id=\"register_submit\">Agregar Seleccionados</button><br /><br />                
        </form>          
    </div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Movimientos:movimientosdocumentocontroldetalle.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 38,  104 => 36,  100 => 35,  96 => 34,  92 => 33,  88 => 32,  84 => 31,  80 => 30,  75 => 28,  71 => 27,  67 => 26,  63 => 25,  59 => 24,  56 => 23,  52 => 22,  33 => 6,  29 => 4,  26 => 3,);
    }
}
