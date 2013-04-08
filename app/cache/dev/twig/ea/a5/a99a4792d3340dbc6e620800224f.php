<?php

/* TwigBundle:Exception:logs.html.twig */
class __TwigTemplate_eaa5a99a4792d3340dbc6e620800224f extends Twig_Template
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
        echo "<ol class=\"traces logs\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "logs"));
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 3
            echo "        <li";
            if (twig_in_filter($this->getAttribute($this->getContext($context, "log"), "priorityName"), array(0 => "EMERG", 1 => "ERR", 2 => "CRIT", 3 => "ALERT", 4 => "ERROR", 5 => "CRITICAL"))) {
                echo " class=\"error\"";
            }
            echo ">
            ";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "log"), "message"), "html", null, true);
            echo "
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 7
        echo "</ol>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:logs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 16,  53 => 13,  34 => 7,  23 => 4,  104 => 24,  95 => 21,  88 => 19,  82 => 19,  78 => 17,  75 => 16,  25 => 4,  22 => 3,  20 => 2,  215 => 90,  211 => 88,  204 => 84,  195 => 80,  193 => 79,  190 => 78,  185 => 76,  179 => 72,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  142 => 54,  135 => 50,  131 => 48,  126 => 46,  120 => 45,  103 => 36,  99 => 34,  70 => 26,  62 => 24,  47 => 19,  57 => 9,  37 => 8,  29 => 5,  24 => 3,  19 => 2,  41 => 7,  224 => 96,  208 => 130,  200 => 83,  196 => 124,  188 => 77,  177 => 71,  169 => 106,  161 => 101,  145 => 91,  137 => 51,  121 => 76,  113 => 43,  106 => 70,  92 => 20,  55 => 14,  32 => 11,  17 => 1,  98 => 20,  94 => 31,  91 => 18,  86 => 6,  80 => 5,  74 => 27,  59 => 23,  54 => 12,  50 => 11,  38 => 6,  21 => 1,  110 => 35,  102 => 37,  100 => 34,  96 => 33,  79 => 40,  76 => 17,  69 => 18,  64 => 15,  60 => 10,  56 => 9,  48 => 7,  40 => 7,  36 => 4,  31 => 4,  28 => 2,  52 => 8,  49 => 12,  44 => 11,  42 => 10,  267 => 7,  263 => 5,  260 => 4,  250 => 124,  207 => 86,  187 => 68,  181 => 65,  178 => 64,  176 => 63,  172 => 61,  153 => 59,  149 => 55,  146 => 55,  129 => 47,  117 => 44,  107 => 34,  101 => 21,  97 => 22,  93 => 37,  89 => 20,  85 => 35,  81 => 34,  77 => 28,  71 => 14,  67 => 12,  63 => 15,  46 => 14,  39 => 9,  35 => 7,  33 => 7,  30 => 4,  27 => 3,);
    }
}
