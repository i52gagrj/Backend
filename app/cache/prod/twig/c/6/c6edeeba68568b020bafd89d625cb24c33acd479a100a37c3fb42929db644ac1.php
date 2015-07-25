<?php

/* i52LTPVBackendBundle:Gestion:gestion.html.twig */
class __TwigTemplate_c6edeeba68568b020bafd89d625cb24c33acd479a100a37c3fb42929db644ac1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVBackendBundle:Gestion:gestion.html.twig", 1);
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
        echo "<div class=\"contenido\" id=\"opciones\">
  <p><a href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("socio_menu");
        echo "\">Socios</a></p>
  <p><a href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("proveedor_menu");
        echo "\">Proveedores</a></p>
  <p><a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("producto_menu");
        echo "\">Productos</a></p>
  <p><a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("usuario_menu");
        echo "\">Usuarios</a></p>
  <p><a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("venta");
        echo "\">Ventas</a></p>
  <p><a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("diario");
        echo "\">Diario</a></p>
</div>
";
    }

    public function getTemplateName()
    {
        return "i52LTPVBackendBundle:Gestion:gestion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 10,  50 => 9,  46 => 8,  42 => 7,  38 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
