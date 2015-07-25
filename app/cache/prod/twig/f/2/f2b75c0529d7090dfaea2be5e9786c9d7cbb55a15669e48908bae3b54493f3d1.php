<?php

/* i52LTPVFrontendBundle:Devolucion:layout.html.twig */
class __TwigTemplate_f2b75c0529d7090dfaea2be5e9786c9d7cbb55a15669e48908bae3b54493f3d1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVFrontendBundle:Devolucion:layout.html.twig", 1);
        $this->blocks = array(
            'contenido' => array($this, 'block_contenido'),
            'devolucion' => array($this, 'block_devolucion'),
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
        $this->loadTemplate("i52LTPVFrontendBundle:Devolucion:original.html.twig", "i52LTPVFrontendBundle:Devolucion:layout.html.twig", 5)->display($context);
        echo "  

  ";
        // line 7
        $this->displayBlock('devolucion', $context, $blocks);
        // line 8
        echo "
";
    }

    // line 7
    public function block_devolucion($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Devolucion:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 7,  42 => 8,  40 => 7,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}
