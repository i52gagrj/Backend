<?php

/* i52LTPVFrontendBundle:Cierres:layout.html.twig */
class __TwigTemplate_5ef8947e7e348d4d4ea816cbb5d4e8254fa13a6a9bc02e2692e9020b7b164759 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVFrontendBundle:Cierres:layout.html.twig", 1);
        $this->blocks = array(
            'contenido' => array($this, 'block_contenido'),
            'cierre' => array($this, 'block_cierre'),
            'javascripts' => array($this, 'block_javascripts'),
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
        echo "  <div ng-app=\"App\" ng-controller=\"AlumnosController\">
  ";
        // line 5
        $this->loadTemplate("i52LTPVFrontendBundle:Cierres:ventas.html.twig", "i52LTPVFrontendBundle:Cierres:layout.html.twig", 5)->display($context);
        echo "  

  ";
        // line 7
        $this->loadTemplate("i52LTPVFrontendBundle:Cierres:desglose.html.twig", "i52LTPVFrontendBundle:Cierres:layout.html.twig", 7)->display($context);
        // line 8
        echo "
  ";
        // line 9
        $this->displayBlock('cierre', $context, $blocks);
        echo "  
  </div>
";
    }

    public function block_cierre($context, array $blocks = array())
    {
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/i52ltpvfrontend/js/scriptrepeat1.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Cierres:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 16,  60 => 14,  57 => 13,  46 => 9,  43 => 8,  41 => 7,  36 => 5,  33 => 4,  30 => 3,  11 => 1,);
    }
}
