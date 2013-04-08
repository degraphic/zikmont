<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_db3030b776fc926d4aefc78fec7ac7f1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("TwigBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "exception"), "message"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, $this->getContext($context, "status_code"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getContext($context, "status_text"), "html", null, true);
        echo ")
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->env->loadTemplate("TwigBundle:Exception:exception.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 7,  224 => 143,  208 => 130,  200 => 125,  196 => 124,  188 => 119,  177 => 111,  169 => 106,  161 => 101,  145 => 91,  137 => 86,  121 => 76,  113 => 74,  106 => 70,  92 => 59,  55 => 28,  32 => 14,  17 => 1,  98 => 20,  94 => 19,  91 => 18,  86 => 6,  80 => 5,  74 => 23,  59 => 14,  54 => 12,  50 => 11,  38 => 8,  21 => 1,  110 => 35,  102 => 37,  100 => 34,  96 => 33,  79 => 49,  76 => 17,  69 => 18,  64 => 11,  60 => 10,  56 => 9,  48 => 7,  40 => 5,  36 => 4,  31 => 6,  28 => 2,  52 => 8,  49 => 12,  44 => 8,  42 => 21,  267 => 7,  263 => 5,  260 => 4,  250 => 124,  207 => 86,  187 => 68,  181 => 65,  178 => 64,  176 => 63,  172 => 61,  153 => 96,  149 => 55,  146 => 54,  129 => 81,  117 => 75,  107 => 34,  101 => 21,  97 => 38,  93 => 37,  89 => 36,  85 => 35,  81 => 34,  77 => 33,  71 => 20,  67 => 30,  63 => 15,  46 => 22,  39 => 13,  35 => 7,  33 => 7,  30 => 4,  27 => 3,);
    }
}
