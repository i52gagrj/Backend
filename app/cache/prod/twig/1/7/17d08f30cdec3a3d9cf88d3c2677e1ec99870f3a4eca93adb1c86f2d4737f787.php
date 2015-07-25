<?php

/* i52LTPVBackendBundle:Gestion:menu.html.twig */
class __TwigTemplate_17d08f30cdec3a3d9cf88d3c2677e1ec99870f3a4eca93adb1c86f2d4737f787 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVBackendBundle:Gestion:menu.html.twig", 1);
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
        echo "<div class=\"contenido\"> 

     <h2>";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["mensaje"]) ? $context["mensaje"] : null), "html", null, true);
        echo "</h2>
     <p><a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath((isset($context["rutaCrear"]) ? $context["rutaCrear"] : null));
        echo "\">Creación</a></p>\t
     <p><a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath((isset($context["rutaListado"]) ? $context["rutaListado"] : null));
        echo "\">Listado</a></p>\t
</div>
";
    }

    public function getTemplateName()
    {
        return "i52LTPVBackendBundle:Gestion:menu.html.twig";
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
