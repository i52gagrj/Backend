<?php

/* i52LTPVFrontendBundle:Ventas:layout.html.twig */
class __TwigTemplate_e78afb238346b49d744dd5d34454135e337b6cd8c6ed2579a2c202e57061a4d2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVFrontendBundle:Ventas:layout.html.twig", 1);
        $this->blocks = array(
            'contenido' => array($this, 'block_contenido'),
            'venta' => array($this, 'block_venta'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_contenido($context, array $blocks = array())
    {
        // line 4
        echo "
  ";
        // line 5
        if (((isset($context["concluido"]) ? $context["concluido"] : null) == false)) {
            // line 6
            echo "    ";
            $this->loadTemplate("i52LTPVFrontendBundle:Ventas:articulos.html.twig", "i52LTPVFrontendBundle:Ventas:layout.html.twig", 6)->display($context);
            // line 7
            echo "  ";
        } else {
            echo " 
    <div class=\"articuloscaja\">
      <h2> Venta realizada Correctamente </h2>
    </div>
  ";
        }
        // line 12
        echo "
  ";
        // line 13
        $this->displayBlock('venta', $context, $blocks);
        // line 14
        echo "
  ";
        // line 15
        $this->loadTemplate("i52LTPVFrontendBundle:Ventas:socio.html.twig", "i52LTPVFrontendBundle:Ventas:layout.html.twig", 15)->display($context);
        // line 16
        echo "
";
    }

    // line 13
    public function block_venta($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Ventas:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 13,  59 => 16,  57 => 15,  54 => 14,  52 => 13,  49 => 12,  40 => 7,  37 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}
