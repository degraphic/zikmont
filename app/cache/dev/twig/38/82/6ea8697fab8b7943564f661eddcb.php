<?php

/* zikmontFrontEndBundle:Informes/Cartera:estadoCuenta.html.twig */
class __TwigTemplate_38826ea8697fab8b7943564f661eddcb extends Twig_Template
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
    <p class=\"description\"><h1>Estado de cuenta \"Cuentas por cobrar\"</h1></p>          
<hr/>

<!-- Formulario Busqueda-->
<form class=\"well\" action=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("consultakardex"), "html", null, true);
        echo "\" method=\"post\" >
    <input class=\"span2\" type=\"text\" name=\"TxtCodigoTercero\" placeholder=\"Cliente...\" required=\"\"/>

    <button class=\"btn btn-primary\" type=\"submit\" name=\"register_submit\" id=\"register_submit\">Generar</button>  
</form>          

<hr/>
<!-- Tabla de datos -->
<table class=\"table table-striped table-bordered table-condensed\">
    <tr>
        <th>Doc</th>                    
        <th>Tercero</th>
        <th>Numero</th>
        <th>Fecha</th>
        <th>Dias</th>                    
        <th>90 mas dias</th>
        <th>61-90</th>                                                       
        <th>31-60</th>
        <th>1-30</th>
        <th>Por Vencer</th>                    
    </tr>
                ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arCuentasCobrar"));
        foreach ($context['_seq'] as $context["_key"] => $context["cuentaCobrar"]) {
            // line 31
            echo "    <tr>                                                                              
        <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "cuentaCobrar"), "abreviatura"), "html", null, true);
            echo "</td>          
        <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "cuentaCobrar"), "nombreCortoTercero"), "html", null, true);
            echo "</td>
        <td style=\"text-align: right\">";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "cuentaCobrar"), "numeroMovimiento"), "html", null, true);
            echo "</td>
        <td style=\"text-align: right\">";
            // line 35
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "cuentaCobrar"), "fecha"), "Y/m/d"), "html", null, true);
            echo "</td>
        <td style=\"text-align: right\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "cuentaCobrar"), "nroDias"), "html", null, true);
            echo "</td>
                    ";
            // line 37
            if (($this->getAttribute($this->getContext($context, "cuentaCobrar"), "nroDias") > 90)) {
                // line 38
                echo "        <td style=\"text-align: right\">";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "cuentaCobrar"), "saldo"), 2, ".", ","), "html", null, true);
                echo "</td>
                    ";
            } else {
                // line 40
                echo "        <td style=\"text-align: right\">0</td>
                    ";
            }
            // line 42
            echo "                    ";
            if ((($this->getAttribute($this->getContext($context, "cuentaCobrar"), "nroDias") > 61) && ($this->getAttribute($this->getContext($context, "cuentaCobrar"), "nroDias") <= 90))) {
                // line 43
                echo "        <td style=\"text-align: right\">";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "cuentaCobrar"), "saldo"), 2, ".", ","), "html", null, true);
                echo "</td>
                    ";
            } else {
                // line 45
                echo "        <td style=\"text-align: right\">0</td>
                    ";
            }
            // line 47
            echo "
                    ";
            // line 48
            if ((($this->getAttribute($this->getContext($context, "cuentaCobrar"), "nroDias") > 31) && ($this->getAttribute($this->getContext($context, "cuentaCobrar"), "nroDias") <= 60))) {
                // line 49
                echo "        <td style=\"text-align: right\">";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "cuentaCobrar"), "saldo"), 2, ".", ","), "html", null, true);
                echo "</td>
                    ";
            } else {
                // line 51
                echo "        <td style=\"text-align: right\">0</td>
                    ";
            }
            // line 53
            echo "
                    ";
            // line 54
            if ((($this->getAttribute($this->getContext($context, "cuentaCobrar"), "nroDias") > 1) && ($this->getAttribute($this->getContext($context, "cuentaCobrar"), "nroDias") <= 30))) {
                // line 55
                echo "        <td style=\"text-align: right\">";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "cuentaCobrar"), "saldo"), 2, ".", ","), "html", null, true);
                echo "</td>
                    ";
            } else {
                // line 57
                echo "        <td style=\"text-align: right\">0</td>
                    ";
            }
            // line 59
            echo "                    ";
            if (($this->getAttribute($this->getContext($context, "cuentaCobrar"), "nroDias") < 1)) {
                // line 60
                echo "        <td style=\"text-align: right\">";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "cuentaCobrar"), "saldo"), 2, ".", ","), "html", null, true);
                echo "</td>
                    ";
            } else {
                // line 62
                echo "        <td style=\"text-align: right\">0</td>
                    ";
            }
            // line 63
            echo "                        

    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cuentaCobrar'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 66
        echo "            
</table>
<br />

</div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Informes/Cartera:estadoCuenta.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 66,  155 => 63,  151 => 62,  145 => 60,  142 => 59,  138 => 57,  132 => 55,  130 => 54,  127 => 53,  123 => 51,  117 => 49,  115 => 48,  112 => 47,  108 => 45,  102 => 43,  99 => 42,  95 => 40,  89 => 38,  87 => 37,  83 => 36,  79 => 35,  75 => 34,  71 => 33,  67 => 32,  64 => 31,  60 => 30,  36 => 9,  29 => 4,  26 => 3,);
    }
}
