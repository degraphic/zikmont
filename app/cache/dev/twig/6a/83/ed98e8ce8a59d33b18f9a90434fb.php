<?php

/* zikmontFrontEndBundle:Contabilidad/Contabilizar:movimientosContabilizar.html.twig */
class __TwigTemplate_6a83ed98e8ce8a59d33b18f9a90434fb extends Twig_Template
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

    <div class=\"page-header\">
        <h1>Lista Movimientos para contabilizar: \"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "arDocumentoTipo"), "NombreDocumentoTipo"), "html", null, true);
        echo "\"</h1>
    </div>              
    <form action=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contabilidadcontabilizar", array("codigoDocumentoTipo" => $this->getAttribute($this->getContext($context, "arDocumentoTipo"), "codigoDocumentoTipoPk"))), "html", null, true);
        echo "\" method=\"post\" novalidate>
        <table  class=\"table table-striped table-bordered table-condensed\">

            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Comentarios</th>
                <th>Total</th>
                <th></th>
            </tr>

                ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arMovimientos"));
        foreach ($context['_seq'] as $context["_key"] => $context["movimiento"]) {
            // line 22
            echo "
            <tr>
                <td><input type=\"hidden\" name=\"LblCodigoMovimiento[]\" value=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"), "html", null, true);
            echo "</td>
                <td>";
            // line 25
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "numeroMovimiento"), 0), "html", null, true);
            echo "</td>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "fecha"), "m/d/Y"), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "movimiento"), "terceroRel"), "nombreCortoTercero"), "html", null, true);
            echo "</td>  
                <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "comentarios"), "html", null, true);
            echo "</td>
                <td style=\"text-align: right\">";
            // line 29
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "subtotal"), 2, ".", ","), "html", null, true);
            echo "</td>  
                <td><input type=\"checkbox\" name=\"ChkSeleccionar[]\" value=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "movimiento"), "codigoMovimientoPk"), "html", null, true);
            echo "\"/></td>              
            </tr>

                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['movimiento'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 33
        echo "            

        </table>       
        <button class=\"btn btn-primary btn-mini\" type=\"submit\" name=\"OpSubmit\" value=\"OpContabilizar\">Contabilizar</button>
    </form>    
    <br />
</div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Contabilidad/Contabilizar:movimientosContabilizar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 33,  89 => 30,  85 => 29,  81 => 28,  77 => 27,  73 => 26,  69 => 25,  63 => 24,  59 => 22,  55 => 21,  39 => 8,  34 => 6,  29 => 3,  26 => 2,);
    }
}
