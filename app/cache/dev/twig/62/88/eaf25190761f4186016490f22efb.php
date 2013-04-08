<?php

/* zikmontFrontEndBundle:Plantillas:mensajes.html.twig */
class __TwigTemplate_6288eaf25190761f4186016490f22efb extends Twig_Template
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
        if (array_key_exists("MensajeAdvertencia", $context)) {
            echo "    
    <div class=\"alert alert-block\">
        <a class=\"close\" data-dismiss=\"alert\" href=\"#\">×</a>
        <h4 class=\"alert-heading\">
            ";
            // line 5
            if (array_key_exists("titulo", $context)) {
                echo "  
               ";
                // line 6
                echo twig_escape_filter($this->env, $this->getContext($context, "titulo"), "html", null, true);
                echo "
            ";
            }
            // line 8
            echo "        </h4>
        
         ";
            // line 10
            if (array_key_exists("mensaje", $context)) {
                echo "  
                ";
                // line 11
                echo twig_escape_filter($this->env, $this->getContext($context, "mensaje"), "html", null, true);
                echo "
            ";
            }
            // line 13
            echo "    </div>          
";
        }
        // line 15
        echo "
";
        // line 16
        if (array_key_exists("MensajeInformativo", $context)) {
            echo "    
    <div class=\"alert alert-info\">
        <a class=\"close\" data-dismiss=\"alert\" href=\"#\">×</a>
        <h4 class=\"alert-heading\">
            ";
            // line 20
            if (array_key_exists("titulo", $context)) {
                echo "  
               ";
                // line 21
                echo twig_escape_filter($this->env, $this->getContext($context, "titulo"), "html", null, true);
                echo "
            ";
            }
            // line 23
            echo "        </h4>
        
         ";
            // line 25
            if (array_key_exists("mensaje", $context)) {
                echo "  
                ";
                // line 26
                echo twig_escape_filter($this->env, $this->getContext($context, "mensaje"), "html", null, true);
                echo "
            ";
            }
            // line 28
            echo "    </div>       
";
        }
        // line 30
        echo "
";
        // line 31
        if (array_key_exists("MensajeAlerta", $context)) {
            echo "    
    <div class=\"alert alert-block\">
        <a class=\"close\" data-dismiss=\"alert\" href=\"#\">×</a>
        <h4 class=\"alert-heading\">
            ";
            // line 35
            if (array_key_exists("titulo", $context)) {
                echo "  
               ";
                // line 36
                echo twig_escape_filter($this->env, $this->getContext($context, "titulo"), "html", null, true);
                echo "
            ";
            }
            // line 38
            echo "        </h4>
        
         ";
            // line 40
            if (array_key_exists("mensaje", $context)) {
                echo "  
                ";
                // line 41
                echo twig_escape_filter($this->env, $this->getContext($context, "mensaje"), "html", null, true);
                echo "
            ";
            }
            // line 43
            echo "    </div>          
 ";
        }
        // line 45
        echo "
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Plantillas:mensajes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 45,  118 => 43,  113 => 41,  109 => 40,  105 => 38,  100 => 36,  96 => 35,  89 => 31,  86 => 30,  82 => 28,  77 => 26,  73 => 25,  69 => 23,  64 => 21,  60 => 20,  53 => 16,  50 => 15,  46 => 13,  41 => 11,  37 => 10,  33 => 8,  28 => 6,  24 => 5,  17 => 1,);
    }
}
