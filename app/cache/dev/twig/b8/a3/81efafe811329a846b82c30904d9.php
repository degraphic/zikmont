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
                    
                    <li><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("zikmontFrontEndBundle_homepage"), "html", null, true);
        echo "\" accesskey=\"i\"><span class=\"key\">I</span>nicio</a></li>

                    <li class=\"dropdown\">
                        <a  href=\"#\" class=\"dropdown-toggle\" accesskey=\"c\" data-toggle=\"dropdown\"><span class=\"key\">C</span>onsultas<b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li><a>Inventario</a>
                                <ul>
                                    <li><a href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("consultakardex"), "html", null, true);
        echo "\">Kardex</a></li>
\t\t\t            <li><a href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("consultadisponibles"), "html", null, true);
        echo "\">Disponibles</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li><a href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("utilidades"), "html", null, true);
        echo "\" accesskey=\"c\"><span class=\"key\">U</span>tilidades</a></li>
                    
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" accesskey=\"p\" data-toggle=\"dropdown\">Maestros<b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"#\">Terceros</a>
                            <li><a href=\"#\">Productos</a>    
                            </li>
                        </ul>
                    </li>
                    
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" accesskey=\"p\" data-toggle=\"dropdown\">Procesos <b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">

                            <li><a href=\"#\">Inventario</a>
                                <ul>
                                    <li><a>Regenerar</a>
                                        <ul>
                                            <li><a href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("regenerarkardex"), "html", null, true);
        echo "\">Kardex</a></li>
                                            <li><a href=\"#\">Costos</a></li>
                                            <li><a href=\"#\">Cantidades</a></li>
                                        </ul>                                
                                    </li>
                                </ul>
                            </li>                    
                        </ul>
                    </li>

                    <li class=\"dropdown\">
                        <a href=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoslista", array("codigoTipoDocumento" => 1)), "html", null, true);
        echo "\" class=\"dropdown-toggle\" accesskey=\"m\" data-toggle=\"dropdown\">Movimientos <b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"#\">Ordenes Compras</a>
                                <ul>
                                    <li><a href=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoslista", array("codigoTipoDocumento" => 5)), "html", null, true);
        echo "\" >Ver</a></li>
                                    <li><a href=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("movimientospendientes", array("codigoDocumentoTipo" => 5)), "html", null, true);
        echo "\" >Pendientes</a></li>
                                    <li><a href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoslista", array("codigoTipoDocumento" => 5)), "html", null, true);
        echo "\" >Pendientes (detalles)</a></li>
                                </ul>
                            </li> 
                            <li><a href=\"#\">Compras</a>
                                <ul>
                                    <li><a href=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoslista", array("codigoTipoDocumento" => 1)), "html", null, true);
        echo "\" >Ver</a></li>
                                </ul>
                            </li>              
                            <li><a href=\"#\">Entradas</a>
                                <ul>
                                    <li><a href=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoslista", array("codigoTipoDocumento" => 6)), "html", null, true);
        echo "\" >Ver</a></li>
                                </ul>
                            </li>                            
                            <li><a href=\"#\" >Salidas</a>
                                <ul>
                                    <li><a href=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoslista", array("codigoTipoDocumento" => 2)), "html", null, true);
        echo "\" >Ver</a></li>
                                </ul>
                            </li>
                            <li><a href=\"#\" >Pedidos</a>
                                <ul>
                                    <li><a href=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoslista", array("codigoTipoDocumento" => 3)), "html", null, true);
        echo "\" >Ver</a></li>
                                </ul>
                            </li>            
                            <li><a href=\"#\" >Facturas</a>
                                <ul>
                                    <li><a href=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoslista", array("codigoTipoDocumento" => 4)), "html", null, true);
        echo "\" >Ver</a></li>
                                </ul>
                            </li>        
                            <li><a href=\"#\" >Recibos pago (Proveedor)</a>
                                <ul>
                                    <li><a href=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("asientoslista", array("codigoAsientoTipo" => 1)), "html", null, true);
        echo "\" >Ver</a></li>
                                </ul>
                            </li>  
                            <li><a href=\"#\" >Recibos pago (Cliente)</a>
                                <ul>
                                    <li><a href=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("asientoslista", array("codigoAsientoTipo" => 2)), "html", null, true);
        echo "\" >Ver</a></li>
                                </ul>
                            </li>                              
                            <li class=\"divider\"></li>
                            <li class=\"nav-header\">Otros</li>
                            <li><a href=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("documentoslista", array("codigoTipoDocumento" => 1)), "html", null, true);
        echo "\" >Listado</a></li>
                        </ul>
                    </li>

                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" accesskey=\"m\" data-toggle=\"dropdown\">Contabilidad <b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contabilidadresumen"), "html", null, true);
        echo "\">Resumen</a></li>                                          
                            <li><a href=\"#\">Procesos</a>
                                <ul>
                                    <li><a>Contabilizar</a>
                                        <ul>
                                            <li><a href=\"";
        // line 115
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contabilidadcontabilizar", array("codigoDocumentoTipo" => 1)), "html", null, true);
        echo "\">Inventario</a></li>
                \t\t            <li><a href=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contabilidadcontabilizar", array("codigoDocumentoTipo" => 4)), "html", null, true);
        echo "\">Facturacion</a></li>
                                        </ul>                                
                                    </li>
                                </ul>
                            </li>     
                            <li><a href=\"#\">Control</a>
                                <ul>
                                    <li><a href=\"";
        // line 123
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contabilidadcontrolcertificadosretenciones"), "html", null, true);
        echo "\">Retenciones</a></li>
                                </ul>
                            </li>                             
                        </ul>
                    </li>

                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" accesskey=\"m\" data-toggle=\"dropdown\">Informes<b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"#\">Cartera</a>
                                <ul>
                                    <li><a href=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("informecarteraestadocuenta"), "html", null, true);
        echo "\" >Estado de cuenta</a></li>
                                    <li><a href=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("gestioncartera"), "html", null, true);
        echo "\" >Gestión</a></li>
                                </ul>
                            </li>                             
                            <li><a href=\"#\">Tesoreria</a>
                                <ul>
                                    <li><a href=\"";
        // line 140
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("informetesoreriaestadocuenta"), "html", null, true);
        echo "\" >Estado de cuenta</a></li>
                                </ul>
                            </li>                              
                            <li><a href=\"#\">Contabilidad</a>
                                <ul>
                                    <li><a href=\"";
        // line 145
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contabilidadbalanceprueba"), "html", null, true);
        echo "\" >Balance de prueba</a></li>
                                    <li><a href=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("informecontabilidadretenciones"), "html", null, true);
        echo "\" >Retenciones</a></li>
                                </ul>
                            </li>    
                            <li><a href=\"#\">Inventario</a>
                                <ul>
                                    <li><a href=\"";
        // line 151
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("contabilidadbalanceprueba"), "html", null, true);
        echo "\" >Inventario Valorizado</a></li>
                                    <li><a href=\"";
        // line 152
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("informeinventarioexistencias"), "html", null, true);
        echo "\" >Existencias</a></li>
                                </ul>
                            </li>                            
                        </ul>
                    </li>
                </ul>
                    
                 <ul class=\"nav pull-right\">
                    <li><a href=\"#\" data-reveal-id=\"myModal\" data-animation=\"fade\">Iniciar Sesion</a></li>
                    <li class=\"divider-vertical\"></li>
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
        return array (  251 => 152,  247 => 151,  239 => 146,  235 => 145,  227 => 140,  219 => 135,  215 => 134,  201 => 123,  191 => 116,  187 => 115,  179 => 110,  169 => 103,  161 => 98,  153 => 93,  145 => 88,  137 => 83,  129 => 78,  121 => 73,  113 => 68,  105 => 63,  101 => 62,  97 => 61,  90 => 57,  76 => 46,  54 => 27,  45 => 21,  41 => 20,  31 => 13,  17 => 1,);
    }
}
