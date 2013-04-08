<?php

/* zikmontFrontEndBundle:Consultas/Inventario:disponibles.html.twig */
class __TwigTemplate_4914173185a4fc36340424509a9103dd extends Twig_Template
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
    <p class=\"description\"><h2>Consultar Disponibles</h2></p>          
<hr/>

<!-- Formulario de busqueda -->    

<form id=\"FrmBusqueda\" class=\"well\" action=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("consultadisponibles"), "html", null, true);
        echo "\" method=\"post\">
    <label>
        <input type=\"text\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getContext($context, "ultimo_item"), "html", null, true);
        echo "\" name=\"TxtCodigoProducto\" required=\"true\" class=\"span2\" onkeypress=\"return validarNumeros(event)\" placeholder=\"Codigo Item...\">
        <button type=\"submit\"  name=\"OpSubmit\" value=\"OpActualizarDetalles\" class=\"btn btn-primary\">Buscar</button>
    </label>
</form>     

<hr/>

";
        // line 19
        if (($this->getContext($context, "arExistencias") != "")) {
            // line 20
            echo "<!-- tabla de datos disponibles-->
<p class=\"description\"><h2>Existencia</h2></p>
<table class=\"table table-striped table-bordered table-condensed\">
    <tr>
        <th>Lote</th>
        <th>Vencimiento</th>   
        <th>Bodega</th>                                                       
        <th>Existencia</th>
        <th>Acciones</th>                    
    </tr>

        ";
            // line 31
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arExistencias"));
            foreach ($context['_seq'] as $context["_key"] => $context["Existencias"]) {
                // line 32
                echo "    <tr>                                                                              
        <td>";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "Existencias"), "loteFk"), "html", null, true);
                echo "</td>  
        <td>";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "Existencias"), "codigoBodegaFk"), "html", null, true);
                echo "</td>  
        <td>";
                // line 35
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "Existencias"), "fechaVencimiento"), "d/m/Y"), "html", null, true);
                echo "</td>                              
        <td>";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "Existencias"), "existencia"), "html", null, true);
                echo "</td>                                                   
        <td></td>                                                   
    </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Existencias'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 39
            echo "  

</table>  
</div>  


";
            // line 45
            if ((twig_test_empty($this->getContext($context, "arExistencias")) || ($this->getContext($context, "arExistencias") == ""))) {
                // line 46
                echo "    ";
                $this->env->loadTemplate("zikmontFrontEndBundle:Plantillas:mensajes.html.twig")->display(array_merge($context, array("titulo" => "Existencias", "MensajeAlerta" => "1", "mensaje" => "No hay existencias de este producto, puede generar una orden de compra dando click en el siguiente boton")));
                echo "    
    <button type=\"submit\" name=\"register_submit\" id=\"register_submit\" class=\"btn-success\">Generar Compra por Promedios</button><br>
";
            }
            // line 49
            echo "
";
        }
        // line 51
        echo "


<!-- Fin tabla de datos disponibles-->

<!-- tabla de datos pedidos pendientes-->
";
        // line 57
        if (($this->getContext($context, "arPedidos") != "")) {
            echo " 
<hr/>

<p class=\"description\"><h2>Pedidos Pendientes</h2></p>          
";
            // line 61
            if ((twig_test_empty($this->getContext($context, "arPedidos")) || ($this->getContext($context, "arPedidos") == ""))) {
                // line 62
                echo "    ";
                $this->env->loadTemplate("zikmontFrontEndBundle:Plantillas:mensajes.html.twig")->display(array_merge($context, array("titulo" => "Pedidos Pendientes", "MensajeInformativo" => "1", "mensaje" => "No Hay pedidos Pendientes")));
            } else {
                // line 64
                echo "
<table class=\"table table-striped table-bordered table-condensed\">
    <tr>
        <th>Cliente</th> 
        <th>Fecha</th> 
        <th>Nro Pedido</th> 
         <th>Cantidad</th>                 
         <th>Pendientes</th>                 
        <th>Comentarios</th> 
    </tr>

        ";
                // line 75
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arPedidos"));
                foreach ($context['_seq'] as $context["_key"] => $context["pedidos"]) {
                    // line 76
                    echo "    <tr>                                                                              
        <td>";
                    // line 77
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "pedidos"), "cantidad"), "html", null, true);
                    echo "</td>  
        <td>";
                    // line 78
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "pedidos"), "fecha"), "html", null, true);
                    echo "</td>                     
        <td>";
                    // line 79
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "pedidos"), "numeroMovimiento"), "html", null, true);
                    echo "</td>                     
        <td>";
                    // line 80
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "pedidos"), "cantidad"), "html", null, true);
                    echo "</td>  
    </tr>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pedidos'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 82
                echo "  

</table>  
";
            }
            // line 86
            echo "

<hr/>
";
        }
        // line 90
        echo "<!-- fin tabla de datos pedidos pendientes-->


<!-- tabla de datos ordenes pendientes-->
";
        // line 94
        if (($this->getContext($context, "arOrdenes") != "")) {
            echo " 
<hr/>
<p class=\"description\"><h2>Ordenes de Compra en Trámite</h2></p>          

";
            // line 98
            if ((twig_test_empty($this->getContext($context, "arOrdenes")) || ($this->getContext($context, "arOrdenes") == ""))) {
                echo " 
    ";
                // line 99
                $this->env->loadTemplate("zikmontFrontEndBundle:Plantillas:mensajes.html.twig")->display(array_merge($context, array("titulo" => "Ordenes de compra en Trámite", "MensajeInformativo" => "1", "mensaje" => "No Hay ordenes de compra en trámite")));
                echo "     
";
            }
            // line 101
            echo "<hr/>
";
        }
        // line 103
        echo "<!-- fin tabla de datos ordenes pendientes-->

</div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Consultas/Inventario:disponibles.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  217 => 103,  213 => 101,  208 => 99,  204 => 98,  197 => 94,  191 => 90,  185 => 86,  179 => 82,  170 => 80,  166 => 79,  162 => 78,  158 => 77,  155 => 76,  151 => 75,  138 => 64,  134 => 62,  132 => 61,  125 => 57,  117 => 51,  113 => 49,  106 => 46,  104 => 45,  96 => 39,  86 => 36,  82 => 35,  78 => 34,  74 => 33,  71 => 32,  67 => 31,  54 => 20,  52 => 19,  42 => 12,  37 => 10,  29 => 4,  26 => 3,);
    }
}
