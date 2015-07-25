<?php

/* i52LTPVBackendBundle:Cuotas:layout.html.twig */
class __TwigTemplate_d53ffd114da406f9eb06ea8b8e68d9215ff9452369f129c4a59ae31eb0e4eec3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVBackendBundle:Cuotas:layout.html.twig", 1);
        $this->blocks = array(
            'contenido' => array($this, 'block_contenido'),
            'cuotas' => array($this, 'block_cuotas'),
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
        $this->displayBlock('cuotas', $context, $blocks);
        // line 6
        echo "
";
    }

    // line 5
    public function block_cuotas($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "i52LTPVBackendBundle:Cuotas:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 5,  37 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}
