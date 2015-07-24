<?php

/* i52LTPVBackendBundle:Gestion:index.html.twig */
class __TwigTemplate_ca4a4b2d0957cfc99ee536f0e145c8ace9d9262983d0065e3222a11fe790baec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVBackendBundle:Gestion:index.html.twig", 1);
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
        echo "
     <h1>Administración</h1>
     <h3> Fecha: ";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["fecha"]) ? $context["fecha"] : null), "html", null, true);
        echo "  </h3>
     ";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["mensaje"]) ? $context["mensaje"] : null), "html", null, true);
        echo "

";
    }

    public function getTemplateName()
    {
        return "i52LTPVBackendBundle:Gestion:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 7,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
