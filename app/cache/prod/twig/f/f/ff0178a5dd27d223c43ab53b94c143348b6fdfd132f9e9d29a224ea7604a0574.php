<?php

/* i52LTPVFrontendBundle:Default:devolucion.html.twig */
class __TwigTemplate_ff0178a5dd27d223c43ab53b94c143348b6fdfd132f9e9d29a224ea7604a0574 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVFrontendBundle:Default:devolucion.html.twig", 1);
        $this->blocks = array(
            'contenido' => array($this, 'block_contenido'),
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
        echo "  <div class=\"contenido\">
     <h1>Devolución</h1>
     <h2>";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["mensaje1"]) ? $context["mensaje1"] : null), "html", null, true);
        echo "</h2>
     <p>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["mensaje2"]) ? $context["mensaje2"] : null), "html", null, true);
        echo "</p>\t
     <p>";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["mensaje3"]) ? $context["mensaje3"] : null), "html", null, true);
        echo "</p>\t
  </div>

";
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Default:devolucion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 8,  39 => 7,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
