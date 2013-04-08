<?php

/* zikmontFrontEndBundle:Movimientos:seleccionardocumento.html.twig */
class __TwigTemplate_d6b17a36714a31c4e763c42ab1dee28f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("zikmontFrontEndBundle::layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "zikmontFrontEndBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "    <div class=\"left_articles\">                
        <h2><a href=\"#\">Seleccione el documento</a></h2>
        <p class=\"description\">Lista de documentos de tipo:</p>                
        <table border=\"1\">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
            </tr>
            ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arDocumentos"));
        foreach ($context['_seq'] as $context["_key"] => $context["documento"]) {
            // line 15
            echo "            <tr>
                <td>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "documento"), "codigoDocumentoPK"), "html", null, true);
            echo "</td>
                <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "documento"), "nombreDocumento"), "html", null, true);
            echo "</td>
                <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "documento"), "codigoDocumentoTipoFk"), "nombreDocumentoTipo"), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['documento'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 20
        echo "            
        </table>        
    </div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Movimientos:seleccionardocumento.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 20,  55 => 18,  51 => 17,  47 => 16,  44 => 15,  40 => 14,  29 => 5,  26 => 4,);
    }
}
