<?php

/* i52LTPVFrontendBundle:Default:cierre.html.twig */
class __TwigTemplate_adc1882d888b5b8485f4d13a0ca9d8e9d02941891a81c88045fd88fc223140d7 extends Twig_Template
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
     <h1>Cierre</h1>
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
        return "i52LTPVFrontendBundle:Default:cierre.html.twig";
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
