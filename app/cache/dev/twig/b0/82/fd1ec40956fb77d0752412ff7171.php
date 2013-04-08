<?php

/* zikmontFrontEndBundle:Plantillas:movimientosNuevo.html.twig */
class __TwigTemplate_b082fd1ec40956fb77d0752412ff7171 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/autocomplete.js"), "html", null, true);
        echo "\"></script>   
<link href=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/zikmont/css/autocompleted.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />


    <script>
        \$(function() {
            ";
        // line 7
        if (array_key_exists("Result", $context)) {
            echo " 
               var availableTags = ";
            // line 8
            echo $this->getContext($context, "Result");
            echo ";
            ";
        }
        // line 9
        echo " 
            \$( \"#tags\" ).autocomplete({
                    source: availableTags
            });
        });
     </script>

        <div id=\"nuevoMovimientoModal\" class=\"reveal-modal\">

            <form id=\"FrmNuevo\" action=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientosnuevo"), "html", null, true);
        echo "\" method=\"post\"> 
                <h1>Nuevo Documento </h1>
                <hr>

                <input name=\"iddocumento\" type=\"hidden\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getContext($context, "codigoDocumento"), "html", null, true);
        echo "\" />
                <table class=\"table-form\" >
                    <tr>
                        <td>              

                    <tr>          
                    <strong>Cliente:</strong><br>
                    <label for=\"tags\"></label>
                    <input class=\"span5\" id=\"tags\" name=codigotercero width=\"200px\" placeholder=\"NIT Cliente\" required autofocus/>
                    </tr>

                    <br/><br/>   

                    <tr>          
                    <strong>Comentarios:</strong><br/>
                    <textarea class=\"span5\" name=comentarios rows=5 placeholder=\"Comentarios\" width=\"300px\"></textarea>
                    </tr>

                    </td>
                    </tr>

                    <tr>  
                        <td></td>
                        <td><button id=\"link_guardar\" class=\"btn btn-primary\" type=\"submit\" name=\"OpSubmit\" value=\"OpGuardar\">Guardar</button></td>
                    </tr>

                </table>

                </fieldset>


            </form>    

            <div id=\"guardar\"></div>
        </div>";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Plantillas:movimientosNuevo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 22,  50 => 18,  39 => 9,  34 => 8,  30 => 7,  22 => 2,  17 => 1,);
    }
}
