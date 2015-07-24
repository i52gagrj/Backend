<?php

/* ::cabecera.html.twig */
class __TwigTemplate_328916d0ea02598142c1f7d135b73066dfcd7d91a2e299438822d8175db13cd8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'cabecera' => array($this, 'block_cabecera'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
    ";
        // line 2
        $this->displayBlock('cabecera', $context, $blocks);
    }

    public function block_cabecera($context, array $blocks = array())
    {
        // line 3
        echo "     <div class=\"ui-layout-north ui-widget-content\">
      <div align=\"center\" id=\"cabecera\">
        <h2><a href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_homepage");
        echo "\">Aplicación TPV</a></h2>
        (Aquí vendria situado el banner de la tienda)
      </div>
     </div>
    ";
    }

    public function getTemplateName()
    {
        return "::cabecera.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  33 => 5,  29 => 3,  23 => 2,  20 => 1,);
    }
}
