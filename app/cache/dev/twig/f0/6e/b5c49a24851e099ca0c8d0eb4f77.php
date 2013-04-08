<?php

/* zikmontFrontEndBundle:Movimientos:movimientosdocumentocontrol.html.twig */
class __TwigTemplate_f06eb5c49a24851e099ca0c8d0eb4f77 extends Twig_Template
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
        <p class=\"description\"><h2>Seleccione el movimiento</h2></p>          
        <table class=\"ztable\">

            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Documento</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>

                ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arMovimientos"));
        foreach ($context['_seq'] as $context["_key"] => $context["movimiento"]) {
            // line 19
            echo "
            <tr>
                <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"), "html", null, true);
            echo "</td>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "numeroMovimiento"), 0), "html", null, true);
            echo "</td>
                <td>";
            // line 23
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "fecha"), "m/d/Y"), "html", null, true);
            echo "</td>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimiento"), "terceroRel"), "nombreCortoTercero"), "html", null, true);
            echo "</td>  
                <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimiento"), "documentoRel"), "nombreDocumento"), "html", null, true);
            echo "</td>  
                <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "subtotal"), 2, ".", ","), "html", null, true);
            echo "</td>
                <td><a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosagregaritemdetalle", array("codigoMovimiento" => $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"), "codigoMovimientoOrigen" => $this->getContext($context, "intCodigoMovimientoOrigen"))), "html", null, true);
            echo "\">Ver detalle</a></td>
            </tr>

                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movimiento'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 30
        echo "            

        </table>         
    </div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Movimientos:movimientosdocumentocontrol.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 30,  77 => 27,  73 => 26,  69 => 25,  65 => 24,  61 => 23,  57 => 22,  53 => 21,  49 => 19,  45 => 18,  29 => 4,  26 => 3,);
    }
}
