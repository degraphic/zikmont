<?php

/* zikmontFrontEndBundle:Consultas/Inventario:kardex.html.twig */
class __TwigTemplate_1a5c0268a8e5308ced79ef9b5f56420f extends Twig_Template
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
        echo "<div class=\"left_articles\">                
    <p class=\"description\"><h1>Consulta de kardex</h1></p>          

<hr/>

<form class=\"well\" action=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("consultakardex"), "html", null, true);
        echo "\" method=\"post\">
    <label>
        <input type=\"text\" class=\"span2\" name=\"TxtCodigoItem\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, "ultimo_item"), "html", null, true);
        echo "\"onkeypress=\"return validarNumeros(event)\" placeholder=\"Codigo Item...\"  required>
        <button type=\"submit\" name=\"register_submit\" id=\"register_submit\" class=\"btn btn-primary\">Buscar</button>
    </label>

</form>     

<hr/>
";
        // line 18
        if (($this->getContext($context, "arMovimientosDetalle") != "")) {
            // line 19
            echo "<table class=\"table table-striped table-bordered table-condensed\">
    <tr>
        <th>ID</th>
        <th>Item</th>
        <th>Descripcion</th>                    
        <th>Documento</th>                    
        <th>Lote</th>
        <th>Bodega</th>                                                       
        <th>Cantidad</th>                    
    </tr>
    
    ";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arMovimientosDetalle"));
            foreach ($context['_seq'] as $context["_key"] => $context["movimientoDetalle"]) {
                // line 31
                echo "    <tr>                                                                              
        <td>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoDetalleMovimientoPk"), "html", null, true);
                echo "</td>  
        <td>";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimientoDetalle"), "itemMD"), "codigoItemPk"), "html", null, true);
                echo "</td>  
        <td>";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimientoDetalle"), "itemMD"), "descripcion"), "html", null, true);
                echo "</td>                              
        <td></td>                              
        <td>";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "loteFk"), "html", null, true);
                echo "</td>                                                   
        <td>";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "codigoBodegaFk"), "html", null, true);
                echo "</td>                                                                        
        <td>";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimientoDetalle"), "cantidadOperada"), "html", null, true);
                echo "</td>                                         
    </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movimientoDetalle'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 40
            echo "            
    
</table>   
";
        }
        // line 44
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Consultas/Inventario:kardex.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 44,  103 => 40,  94 => 38,  90 => 37,  86 => 36,  81 => 34,  77 => 33,  73 => 32,  70 => 31,  66 => 30,  53 => 19,  51 => 18,  41 => 11,  36 => 9,  29 => 4,  26 => 3,);
    }
}
