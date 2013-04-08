<?php

/* zikmontFrondEndBundle:Default:seleccionardocumento.html.twig */
class __TwigTemplate_d1627e5eb3580e2a145bf3ec3a4fcf9f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("zikmontFrondEndBundle::layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "zikmontFrondEndBundle::layout.html.twig";
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
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['documento'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 19
        echo "        </table>
    </div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrondEndBundle:Default:seleccionardocumento.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 19,  50 => 16,  46 => 15,  43 => 14,  39 => 13,  29 => 5,  26 => 4,);
    }
}
