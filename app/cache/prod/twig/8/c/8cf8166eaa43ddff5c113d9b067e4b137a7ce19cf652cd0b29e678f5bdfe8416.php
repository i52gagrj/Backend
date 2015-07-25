<?php

/* ::layout.html.twig */
class __TwigTemplate_8cf8166eaa43ddff5c113d9b067e4b137a7ce19cf652cd0b29e678f5bdfe8416 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "::layout.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'cabecera' => array($this, 'block_cabecera'),
            'login' => array($this, 'block_login'),
            'menu' => array($this, 'block_menu'),
            'contenido' => array($this, 'block_contenido'),
            'pie' => array($this, 'block_pie'),
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
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo " <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/estilo.css"), "html", null, true);
        echo "\"
       type=\"text/css\" rel=\"stylesheet\" />
";
    }

    // line 8
    public function block_body($context, array $blocks = array())
    {
        // line 9
        echo "
";
        // line 10
        $this->displayBlock('cabecera', $context, $blocks);
        // line 16
        echo "
";
        // line 17
        $this->displayBlock('login', $context, $blocks);
        // line 23
        echo "
";
        // line 24
        $this->displayBlock('menu', $context, $blocks);
        // line 36
        echo "
";
        // line 37
        $this->displayBlock('contenido', $context, $blocks);
        // line 39
        echo "
";
        // line 40
        $this->displayBlock('pie', $context, $blocks);
        // line 47
        echo "
";
    }

    // line 10
    public function block_cabecera($context, array $blocks = array())
    {
        // line 11
        echo "<div align=\"center\" id=\"cabecera\">
  <h2><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_homepage");
        echo "\">Aplicación TPV</a></h2>
    (Aquí vendria situado el banner de la tienda)
</div>
";
    }

    // line 17
    public function block_login($context, array $blocks = array())
    {
        // line 18
        echo "<hr/> 
<div align=\"right\" id=\"login\">
    (Aquí se situaria la identidad del usuario conectado y la opción de salir)
</div>
";
    }

    // line 24
    public function block_menu($context, array $blocks = array())
    {
        // line 25
        echo "<div align=\"center\" id=\"menu\">
<ul/>  
  <li><a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_ventas");
        echo "\">venta</a> 
  <li><a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_cierre");
        echo "\">cierre</a> 
  <li><a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_devolucion");
        echo "\">devolucion</a> 
  <li><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_gestion");
        echo "\">gestion</a> 
  <li><a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_informes");
        echo "\">informes</a> 
  <li><a href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_cuotas");
        echo "\">cuotas</a>
<ul/>
</div>
";
    }

    // line 37
    public function block_contenido($context, array $blocks = array())
    {
    }

    // line 40
    public function block_pie($context, array $blocks = array())
    {
        // line 41
        echo "<div id=\"pie\">
<hr/>
<div align=\"center\">- pie de página -</div>
</div>
<script src=\"//ajax.googleapis.com/ajax/libs/angularjs/1.4.0-beta.1/angular.min.js\"></script>
";
    }

    // line 50
    public function block_javascripts($context, array $blocks = array())
    {
        // line 51
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/i52ltpvfrontend/js/angular.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/i52ltpvfrontend/js/scripts3.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 52,  159 => 51,  156 => 50,  147 => 41,  144 => 40,  139 => 37,  131 => 32,  127 => 31,  123 => 30,  119 => 29,  115 => 28,  111 => 27,  107 => 25,  104 => 24,  96 => 18,  93 => 17,  85 => 12,  82 => 11,  79 => 10,  74 => 47,  72 => 40,  69 => 39,  67 => 37,  64 => 36,  62 => 24,  59 => 23,  57 => 17,  54 => 16,  52 => 10,  49 => 9,  46 => 8,  38 => 4,  35 => 3,  11 => 1,);
    }
}
