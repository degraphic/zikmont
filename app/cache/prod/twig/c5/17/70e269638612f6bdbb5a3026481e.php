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
        // line 5
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "
    <div class=\"page-header\">
        <h1>Lista Movimientos: <input name=\"idocumento\" type=\"hidden\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "arDocumento"), "codigoDocumentoPK"), "html", null, true);
        echo "\" /><small><label id=\"lblNombreDocumento\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "arDocumento"), "nombreDocumento"), "html", null, true);
        echo "</label></small></h1>
    </div>              
    
    <table  class=\"table table-striped table-bordered table-condensed\">

        <tr>
            <th>ID</th>
            <th>Número</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Estado</th>
            <th>Comentarios</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>

            ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arMovimientos"));
        foreach ($context['_seq'] as $context["_key"] => $context["movimiento"]) {
            // line 31
            echo "
        <tr>
            <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"), "html", null, true);
            echo "</td>
            <td>";
            // line 34
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "numeroMovimiento"), 0), "html", null, true);
            echo "</td>
            <td>";
            // line 35
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "fecha"), "m/d/Y"), "html", null, true);
            echo "</td>
            <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimiento"), "terceroRel"), "nombreCortoTercero"), "html", null, true);
            echo "</td>  
            <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "comentarios"), "html", null, true);
            echo "</td>
            <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "comentarios"), "html", null, true);
            echo "</td>
            <td>";
            // line 39
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "subtotal"), 2, ".", ","), "html", null, true);
            echo "</td>
            <td><a href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"))), "html", null, true);
            echo "\">Ver detalle</a></td>
        </tr>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movimiento'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 43
        echo "            

    </table>        
    <br />

    <a href=\"#\" data-reveal-id=\"nuevoMovimientoModal\" data-animation=\"fade\">Nuevo</a>

    <div id=\"nuevoMovimientoModal\" class=\"reveal-modal\">

        <form id=\"FrmNuevo\" action=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosnuevo"), "html", null, true);
        echo "\" method=\"post\"> 
            <h1>Nuevo Documento</h1>
            <hr>
            <input name=\"iddocumento\" type=\"hidden\" value=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "arDocumento"), "codigoDocumentoPK"), "html", null, true);
        echo "\" />
            <table class=\"table-form\" >
                <tr>
                    <td>              

                <tr>          
                    <td><label>Identificación:</label><br/></td>
                    <td><input name=codigotercero type=text placeholder=\"NIT Cliente\" width=\"200px\" required autofocus> </td>
                </tr>

                <tr>          
                    <td><label >Comentarios:</label><br/></td>
                    <td><textarea name=comentarios rows=5 placeholder=\"Comentarios\" width=\"300px\" required></textarea></td>
                </tr>

                </td>
                </tr>

                <tr>  

                    <td>

                        <button id=\"link_guardar\" type=\"submit\" name=\"OpSubmit\" value=\"OpGuardar\">Guardar</button>
                    </td>
                </tr>

            </table>

            </fieldset>


        </form>    

        <div id=\"guardar\"></div>
    </div>

</div>
";
    }

    // line 5
    public function block_javascripts($context, array $blocks = array())
    {
        // line 6
        echo "<script>
        function validarTercero(codigotercero) {
                \$('#divtercero').load('";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientoslista", array("codigoDocumento" => $this->getAttribute($this->getContext($context, "arDocumento"), "codigoDocumentoPK"))), "html", null, true);
        echo "');
        }
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
        return array (  173 => 8,  169 => 6,  166 => 5,  124 => 55,  118 => 52,  107 => 43,  97 => 40,  93 => 39,  89 => 38,  85 => 37,  81 => 36,  77 => 35,  73 => 34,  69 => 33,  65 => 31,  61 => 30,  40 => 14,  36 => 12,  34 => 5,  30 => 3,  27 => 2,);
    }
}
