<?php

/* zikmontFrontEndBundle:Default:index.html.twig */
class __TwigTemplate_a0f931dd477154883a5e1fb1c0c82a3d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("zikmontFrontEndBundle::layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "zikmontFrontEndBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "
                <div class=\"left_articles\">
                        <div class=\"buttons\"><p><a href=\"#\" class=\"bluebtn\">Read</a> <a href=\"#\" class=\"greenbtn\">Mark</a></p></div>
                        <div class=\"calendar\"><p>NOV<br />13th</p></div>
                        <h2><a href=\"#\">The Future of P2P Networks</a></h2>
                        <p class=\"description\">People like to share files, but what will the future bring?</p>
                        <p><img src=\"images/thumb.jpg\" class=\"thumbnail\" alt=\"thumbnail\" /><a href=\"#\">Lorem ipsum dolor sit amet</a>, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. <a href=\"#\">Ut wisi enim ad minim veniam</a>, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui.</p>
                </div>

                <div class=\"thirds\">
                        <div class=\"smallboxtop\"></div>
                        <div class=\"smallbox\">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        </div>
                </div>

                <div class=\"thirds\">
                        <div class=\"smallboxtop\"></div>
                        <div class=\"smallbox\">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        </div>
                </div>

                <div class=\"thirds\">
                        <div class=\"smallboxtop\"></div>
                        <div class=\"smallbox\">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        </div>
                </div>
";
    }

    public function getTemplateName()
    {
        return "zikmontFrontEndBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  26 => 2,);
    }
}
