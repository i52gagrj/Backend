<?php

/* i52LTPVBackendBundle:Default:informes.html.twig */
class __TwigTemplate_b0f3531d9ed1db5cda4248339c8b09990478eade080e98cad2989d151f925b62 extends Twig_Template
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
     <h1>Informes</h1>
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

";
    }

    public function getTemplateName()
    {
        return "i52LTPVBackendBundle:Default:informes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 8,  47 => 7,  43 => 6,  39 => 4,  36 => 3,  11 => 1,);
    }
}
