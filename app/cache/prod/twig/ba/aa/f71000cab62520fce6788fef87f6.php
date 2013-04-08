<?php

/* zikmontFrontEndBundle:Documentos:documentosLista.html.twig */
class __TwigTemplate_baaaf71000cab62520fce6788fef87f6 extends Twig_Template
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
        <h2>Lista de documentos</h2>
        <table  class=\"table table-striped table-bordered table-condensed\"> 
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th></th>
                <th></th>
            </tr>
            ";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arDocumentos"));
        foreach ($context['_seq'] as $context["_key"] => $context["documento"]) {
            // line 14
            echo "            <tr>
                <td>";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "documento"), "codigoDocumentoPK"), "html", null, true);
            echo "</td>
                <td>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "documento"), "nombreDocumento"), "html", null, true);
            echo "</td>
                <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "documento"), "DocumentoTipo"), "nombreDocumentoTipo"), "html", null, true);
            echo "</td>                 
                <td><a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientoslista", array("codigoDocumento" => $this->getAttribute($this->getContext($context, "documento"), "codigoDocumentoPK"))), "html", null, true);
            echo "\">Ver movimientos</a></td>
                <td><a href=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientoslista", array("codigoDocumento" => $this->getAttribute($this->getContext($context, "documento"), "codigoDocumentoPK"))), "html", null, true);
            echo "\">Nuevo</a></td>
            </tr>   
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['documento'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 21
        echo "            
        </table>        
    
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Documentos:documentosLista.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 21,  64 => 19,  60 => 18,  56 => 17,  52 => 16,  48 => 15,  45 => 14,  41 => 13,  29 => 3,  26 => 2,);
    }
}
