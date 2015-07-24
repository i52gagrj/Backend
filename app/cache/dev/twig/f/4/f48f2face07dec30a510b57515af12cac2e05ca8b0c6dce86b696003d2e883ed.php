<?php

/* i52LTPVBackendBundle:Gestion:informes.html.twig */
class __TwigTemplate_f48f2face07dec30a510b57515af12cac2e05ca8b0c6dce86b696003d2e883ed extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVBackendBundle:Gestion:informes.html.twig", 1);
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
     <h1>Informes</h1>
     <h2>";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["mensaje1"]) ? $context["mensaje1"] : $this->getContext($context, "mensaje1")), "html", null, true);
        echo "</h2>
     <p>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["mensaje2"]) ? $context["mensaje2"] : $this->getContext($context, "mensaje2")), "html", null, true);
        echo "</p>\t
     <p>";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["mensaje3"]) ? $context["mensaje3"] : $this->getContext($context, "mensaje3")), "html", null, true);
        echo "</p>\t
  </div>
";
    }

    public function getTemplateName()
    {
        return "i52LTPVBackendBundle:Gestion:informes.html.twig";
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
