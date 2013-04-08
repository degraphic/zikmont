<?php

/* carteraGestionBundle:Gestion:gestion.html.twig */
class __TwigTemplate_7494c79ef049cea0716872cae739636f extends Twig_Template
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
    <p class=\"description\"><h1>Gestion de Cartera<h1></p>          
            <hr/>

            <div class=\"tabbable tabs-left\">
                
                <span class=\"badge\"><a href=\"#\" data-reveal-id=\"campanaNueva\" data-animation=\"fade\">Crear Campaña de Cobro</a></span>       
                
                <ul class=\"nav nav-tabs\">
                    <li class=\"active\">
                        <!-- Formulario Busqueda-->
                        <form class=\"well\" action=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("consultakardex"), "html", null, true);
        echo "\" method=\"post\" >
                            <input class=\"span2\" type=\"text\" name=\"TxtCodigoTercero\" placeholder=\"Cliente\" />
                            
                            <button class=\"btn btn-primary\" type=\"submit\" name=\"register_submit\" id=\"register_submit\">Analizar</button>  
                            <br/>
                                             
                    </li>

                    <li>

                        <fieldset>

                            <legend><h4>Filtro Avanzado</h4></legend>

                            <br>

                            <select>
                                <option value=\"\">---Mostrar Carteras---</option>
                                <option value=\"1\"> Menores iguales a 30 días </option>
                                <option value=\"1\"> Mayores de 30 menores o iguales a 60 días</option>
                            </select>
                        </fieldset>

                    </li>
                </ul>

                </form>  

                <div id=\"documentosGestion\" class=\"tab-content\">
                    <table class=\"table table-striped table-bordered table-condensed\">
                        <tr>
                            <th>Doc</th>                    
                            <th>Cliente</th>
                            <th>Número</th>
                            <th>Fecha</th>
                            <th>Días</th>                                      
                        </tr>

                    </table>
                </div>
            </div>

            <div id=\"campanaNueva\" class=\"reveal-modal\">
                <fieldset>
                    <legend>Crear Campaña de Cobro</legend>
                    <form class=\"well\" action=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("consultakardex"), "html", null, true);
        echo "\" method=\"post\" >
                        <input class=\"span2\" type=\"text\" name=\"TxtCodigoTercero\" placeholder=\"Nombre de Campaña\" required=\"\"/>
                        <button class=\"btn btn-primary\" type=\"submit\" name=\"register_submit\" id=\"register_submit\">Crear</button>  
                    </form>
                </fieldset>
            </div>

            <hr/>

            <br />

            </div>
";
    }

    public function getTemplateName()
    {
        return "carteraGestionBundle:Gestion:gestion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 60,  42 => 15,  29 => 4,  26 => 3,);
    }
}
