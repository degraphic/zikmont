<?php

/* zikmontFrontEndBundle:Plantillas:menu.html.twig */
class __TwigTemplate_b8a381efafe811329a846b82c30904d9 extends Twig_Template
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
        echo "<div class=\"navbar navbar-fixed-top\">
    <div class=\"navbar-inner\">
        <div class=\"container\">
            <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </a>
            <a class=\"brand\" href=\"#\">Zikmont C1.0.0</a>
            <div class=\"nav-collapse\">
                <ul class=\"nav\">

                    <li class=\"dropdown\">
                        <a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoslista"), "html", null, true);
        echo "\" class=\"dropdown-toggle\" accesskey=\"m\" data-toggle=\"dropdown\">Movimientos <b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "arDocumentos"));
        foreach ($context['_seq'] as $context["_key"] => $context["documento"]) {
            // line 17
            echo "                                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientoslista", array("codigoDocumento" => $this->getAttribute($this->getContext($context, "documento"), "codigoDocumentoPK"))), "html", null, true);
            echo "\" accesskey=\"r\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "documento"), "nombreDocumento"), "html", null, true);
            echo "</a></li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['documento'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 18
        echo "   
                            
                            <li class=\"divider\"></li>
                            <li class=\"nav-header\">Otros</li>
                            <li><a href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoslista"), "html", null, true);
        echo "\" >Listado</a></li>
                        </ul>
                    </li>

                    <li><a class=\"current\" href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoslista"), "html", null, true);
        echo "\" accesskey=\"ma\"><span class=\"key\">M</span>aestros</a></li>

                    <li><a href=\"#\" accesskey=\"i\"><span class=\"key\">I</span>mages</a></li>
                    <li><a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("utilidades"), "html", null, true);
        echo "\" accesskey=\"m\"><span class=\"key\">U</span>tilidades</a></li>
                    <li><a href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("configuraciones"), "html", null, true);
        echo "\" accesskey=\"c\"><span class=\"key\">C</span>onfiguraciones</a></li>
                </ul>

                <ul class=\"nav pull-right\">
                    <li><a href=\"#\" data-reveal-id=\"myModal\" data-animation=\"fade\">Iniciar Sesion</a></li>
                    <li class=\"divider-vertical\"></li>
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Acerca de <b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"#\">Action</a></li>
                            <li><a href=\"#\">Another action</a></li>
                            <li><a href=\"#\">Something else here</a></li>
                            <li class=\"divider\"></li>
                            <li><a href=\"#\">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Plantillas:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 29,  65 => 26,  52 => 18,  41 => 17,  37 => 16,  32 => 14,  450 => 152,  445 => 151,  439 => 148,  434 => 145,  429 => 144,  424 => 141,  419 => 140,  416 => 138,  411 => 130,  407 => 129,  403 => 128,  399 => 127,  395 => 126,  391 => 125,  387 => 124,  383 => 123,  379 => 122,  375 => 121,  371 => 120,  367 => 119,  363 => 118,  359 => 117,  355 => 116,  351 => 115,  347 => 114,  342 => 113,  338 => 111,  333 => 110,  328 => 107,  324 => 106,  320 => 105,  315 => 104,  310 => 101,  305 => 100,  299 => 97,  294 => 94,  289 => 93,  283 => 90,  278 => 88,  273 => 86,  271 => 85,  266 => 82,  262 => 81,  258 => 80,  254 => 79,  249 => 78,  244 => 75,  239 => 74,  234 => 71,  229 => 70,  223 => 67,  218 => 64,  213 => 63,  208 => 60,  203 => 59,  198 => 56,  193 => 55,  188 => 52,  184 => 51,  180 => 50,  176 => 49,  172 => 48,  167 => 47,  161 => 44,  155 => 41,  149 => 38,  144 => 35,  140 => 34,  136 => 33,  132 => 32,  127 => 31,  122 => 28,  118 => 27,  114 => 26,  110 => 25,  106 => 24,  102 => 23,  98 => 22,  90 => 20,  82 => 18,  78 => 17,  74 => 16,  70 => 15,  62 => 13,  34 => 6,  22 => 3,  17 => 1,  94 => 21,  91 => 17,  86 => 19,  81 => 6,  75 => 30,  69 => 20,  66 => 14,  60 => 14,  58 => 22,  54 => 11,  50 => 10,  46 => 9,  42 => 8,  38 => 7,  33 => 7,  31 => 6,  21 => 1,  89 => 34,  87 => 33,  64 => 16,  61 => 11,  55 => 9,  51 => 8,  47 => 7,  43 => 6,  39 => 5,  35 => 4,  30 => 5,  27 => 5,  29 => 3,  26 => 4,);
    }
}
