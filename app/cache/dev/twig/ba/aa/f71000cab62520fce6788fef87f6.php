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
        echo "    <div class=\"page-header\">
        <h2>Lista de documentos</h2>
    </div>                      
        <table  class=\"table table-striped table-bordered table-condensed\"> 
            <tr>
                <th>ID</th>
                <th></th>
                <th>Nombre</th>                
                <th>Op</th>
                <th>Consecutivo</th>
                
                <th></th>
                <th></th>
            </tr>
            ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arDocumentos"));
        foreach ($context['_seq'] as $context["_key"] => $context["documento"]) {
            // line 18
            echo "            <tr>
                <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "documento"), "codigoDocumentoPK"), "html", null, true);
            echo "</td>
                <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "documento"), "abreviatura"), "html", null, true);
            echo "</td>
                <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "documento"), "nombreDocumento"), "html", null, true);
            echo "</td>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "documento"), "operacionInventario"), "html", null, true);
            echo "</td>                 
                <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "documento"), "consecutivo"), "html", null, true);
            echo "</td>                 
                <td style=\"text-align: center\"><a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientoslista", array("codigoDocumento" => $this->getAttribute($this->getContext($context, "documento"), "codigoDocumentoPK"))), "html", null, true);
            echo "\"><IMG SRC=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/imagenes/tema1/glyphicons_152_new_window.png"), "html", null, true);
            echo "\" WIDTH=20 HEIGHT=20></a></td>
                <td style=\"text-align: center\"><a href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientoslista", array("codigoDocumento" => $this->getAttribute($this->getContext($context, "documento"), "codigoDocumentoPK"))), "html", null, true);
            echo "\"><IMG SRC=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/imagenes/tema1/glyphicons_036_file.png"), "html", null, true);
            echo "\" WIDTH=20 HEIGHT=20></a></td>                
            </tr>   
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['documento'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 27
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
        return array (  89 => 27,  78 => 25,  72 => 24,  68 => 23,  64 => 22,  60 => 21,  56 => 20,  52 => 19,  49 => 18,  45 => 17,  29 => 3,  26 => 2,);
    }
}
