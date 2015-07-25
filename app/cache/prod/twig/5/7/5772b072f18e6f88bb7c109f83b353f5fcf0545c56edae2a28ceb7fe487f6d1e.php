<?php

/* i52LTPVBackendBundle:Usuario:new.html.twig */
class __TwigTemplate_5772b072f18e6f88bb7c109f83b353f5fcf0545c56edae2a28ceb7fe487f6d1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVBackendBundle:Usuario:new.html.twig", 1);
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
    <h3>Añadir Usuario</h3>

    ";
        // line 7
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form');
        echo "

        <ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("usuario");
        echo "\">
            Volver al listado
        </a>
    </li>
</ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "i52LTPVBackendBundle:Usuario:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 11,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }
}
