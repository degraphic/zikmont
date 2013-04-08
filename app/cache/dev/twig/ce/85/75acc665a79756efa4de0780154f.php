<?php

/* TwigBundle::layout.html.twig */
class __TwigTemplate_ce8575acc665a79756efa4de0780154f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\"/>
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/exception_layout.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
        <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/exception.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
    </head>
    <body>
        <div id=\"content\">
            <div class=\"header clear_fix\">
                <div class=\"header_logo\">
                    <img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/logo_symfony.gif"), "html", null, true);
        echo "\" alt=\"Symfony\" />
                </div>

                <div class=\"search\">
                  <form method=\"get\" action=\"http://symfony.com/search\">
                    <div class=\"form_row\">

                      <label for=\"search_id\">
                          <img src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/grey_magnifier.png"), "html", null, true);
        echo "\" alt=\"Search on Symfony website\" />
                      </label>

                      <input name=\"q\" id=\"search_id\" type=\"search\" placeholder=\"Search on Symfony website\" />

                      <button type=\"submit\">
                        <span class=\"border_l\">
                          <span class=\"border_r\">
                            <span class=\"btn_bg\">OK</span>
                          </span>
                        </span>
                      </button>
                    </div>
                   </form>
                </div>
            </div>

            ";
        // line 39
        $this->displayBlock('body', $context, $blocks);
        // line 40
        echo "        </div>
    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "";
    }

    // line 39
    public function block_body($context, array $blocks = array())
    {
        echo "";
    }

    public function getTemplateName()
    {
        return "TwigBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 22,  37 => 8,  29 => 6,  24 => 4,  19 => 1,  41 => 7,  224 => 143,  208 => 130,  200 => 125,  196 => 124,  188 => 119,  177 => 111,  169 => 106,  161 => 101,  145 => 91,  137 => 86,  121 => 76,  113 => 74,  106 => 70,  92 => 39,  55 => 28,  32 => 14,  17 => 1,  98 => 20,  94 => 19,  91 => 18,  86 => 6,  80 => 5,  74 => 23,  59 => 14,  54 => 12,  50 => 11,  38 => 8,  21 => 1,  110 => 35,  102 => 37,  100 => 34,  96 => 33,  79 => 40,  76 => 17,  69 => 18,  64 => 11,  60 => 10,  56 => 9,  48 => 7,  40 => 5,  36 => 4,  31 => 6,  28 => 2,  52 => 8,  49 => 12,  44 => 8,  42 => 21,  267 => 7,  263 => 5,  260 => 4,  250 => 124,  207 => 86,  187 => 68,  181 => 65,  178 => 64,  176 => 63,  172 => 61,  153 => 96,  149 => 55,  146 => 54,  129 => 81,  117 => 75,  107 => 34,  101 => 21,  97 => 38,  93 => 37,  89 => 36,  85 => 35,  81 => 34,  77 => 39,  71 => 20,  67 => 30,  63 => 15,  46 => 14,  39 => 13,  35 => 7,  33 => 7,  30 => 4,  27 => 3,);
    }
}
