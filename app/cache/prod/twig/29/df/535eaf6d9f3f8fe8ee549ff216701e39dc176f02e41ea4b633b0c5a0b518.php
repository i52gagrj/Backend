<?php

/* i52LTPVBackendBundle:Default:gestion.html.twig */
class __TwigTemplate_29df535eaf6d9f3f8fe8ee549ff216701e39dc176f02e41ea4b633b0c5a0b518 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'contenido' => array($this, 'block_contenido'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_contenido($context, array $blocks = array())
    {
        // line 4
        echo "<div id=\"opciones\">
  <p><a href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_socios");
        echo "\">socios</a></p>
  <p><a href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_proveedores");
        echo "\">proveedores</a></p>
  <p><a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_productos");
        echo "\">productos</a></p>
  <p><a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_usuarios");
        echo "\">usuarios</a></p>
</div>
";
    }

    public function getTemplateName()
    {
        return "i52LTPVBackendBundle:Default:gestion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 8,  50 => 7,  46 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
