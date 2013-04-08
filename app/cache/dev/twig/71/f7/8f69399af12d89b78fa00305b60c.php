<?php

/* zikmontFrontEndBundle:Movimientos:movimientosAgregarLote.html.twig */
class __TwigTemplate_71f78f69399af12d89b78fa00305b60c extends Twig_Template
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
        $this->displayBlock('javascripts', $context, $blocks);
        // line 17
        echo "

    <div class=\"left_articles\">                
        <p class=\"description\"><h2>Seleccionar un lote</h2></p>      
    <form id=\"FrmListado\" action=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosagregarlote", array("codigoMovimientoDetalle" => 1)), "html", null, true);
        echo "\" method=\"post\">        
        <table class=\"table table-striped table-bordered table-condensed\">
            <tr>
                <th>Bodega</th>
                <th>Lote</th>
                <th>Existencia</th>
                <th>Acción</th>
            </tr>
            
            ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arLotes"));
        foreach ($context['_seq'] as $context["_key"] => $context["lote"]) {
            // line 31
            echo "            <tr> 
                <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "lote"), "codigoBodegaFk"), "html", null, true);
            echo "</td>  
                <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "lote"), "loteFk"), "html", null, true);
            echo "</td>
                <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "lote"), "existencia"), "html", null, true);
            echo "</td>
                <td><image src=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/imagenes/grid/editar.gif"), "html", null, true);
            echo "\" title=\"Editar Detalle\" onclick=\"enviarValores('";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "lote"), "loteFk"), "html", null, true);
            echo "','";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "lote"), "codigoBodegaFk"), "html", null, true);
            echo "');\"/></td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lote'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 37
        echo "                                
        </table><br />        
        </form>        
    </div>
";
    }

    // line 3
    public function block_javascripts($context, array $blocks = array())
    {
        echo " 
    <script>
            function enviarValores(lote,bodega) {
                var txtLote = \"TxtLote[";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, "intCodigoMovimientoDetalle"), "html", null, true);
        echo "]\";
                var txtBodega = \"TxtBodega[";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, "intCodigoMovimientoDetalle"), "html", null, true);
        echo "]\";
                /*var txtVence = \"TxtVence[";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, "intCodigoMovimientoDetalle"), "html", null, true);
        echo "]\";*/
                               
                window.opener.document.getElementById(txtLote).value=lote;
\t\twindow.opener.document.getElementById(txtBodega).value=bodega;
\t\t/*window.opener.document.getElementById(txtVence).value=vence;*/
\t\tself.close();
            }
    </script>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Movimientos:movimientosAgregarLote.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 8,  101 => 7,  97 => 6,  90 => 3,  82 => 37,  69 => 35,  65 => 34,  61 => 33,  57 => 32,  54 => 31,  50 => 30,  38 => 21,  32 => 17,  30 => 3,  27 => 2,);
    }
}
