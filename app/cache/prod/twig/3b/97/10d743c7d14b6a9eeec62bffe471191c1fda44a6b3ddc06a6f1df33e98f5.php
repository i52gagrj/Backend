<?php

/* i52LTPVBackendBundle:Default:menu.html.twig */
class __TwigTemplate_3b9710d743c7d14b6a9eeec62bffe471191c1fda44a6b3ddc06a6f1df33e98f5 extends Twig_Template
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
        echo "
     <h2>";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["mensaje"]) ? $context["mensaje"] : null), "html", null, true);
        echo "</h2>
     <p><a href=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath((isset($context["rutaCrear"]) ? $context["rutaCrear"] : null));
        echo "\">Creación</a></p>\t
     <p><a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath((isset($context["rutaLeer"]) ? $context["rutaLeer"] : null));
        echo "\">Lectura</a></p>\t
     <p><a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath((isset($context["rutaModificar"]) ? $context["rutaModificar"] : null));
        echo "\">Modificación</a></p>\t
     <p><a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath((isset($context["rutaBorrar"]) ? $context["rutaBorrar"] : null));
        echo "\">Borrado</a></p>\t

";
    }

    public function getTemplateName()
    {
        return "i52LTPVBackendBundle:Default:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 9,  54 => 8,  50 => 7,  46 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
