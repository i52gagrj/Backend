<?php

/* base.html.twig */
class __TwigTemplate_7721b96ea58c424d7760cee873f2c6c5e59650dc11e03f1d6ff23b30a7ea5231 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'cabecera' => array($this, 'block_cabecera'),
            'menu' => array($this, 'block_menu'),
            'contenido' => array($this, 'block_contenido'),
            'pie' => array($this, 'block_pie'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html ng-app>
  <head>
    <meta charset=\"UTF-8\" />
    <title>
      ";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        // line 7
        echo "    </title>
    ";
        // line 8
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "  </head>

  <body>
  <div class=\"estructura\"> 
  ";
        // line 15
        $this->displayBlock('body', $context, $blocks);
        // line 59
        echo "  </div> 

  ";
        // line 61
        $this->displayBlock('javascripts', $context, $blocks);
        // line 66
        echo "   
  </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "TPV - Comercio Justo";
    }

    // line 8
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 9
        echo "      <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/estilo.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
    ";
    }

    // line 15
    public function block_body($context, array $blocks = array())
    {
        // line 16
        echo "
    ";
        // line 17
        $this->displayBlock('cabecera', $context, $blocks);
        // line 32
        echo "
    ";
        // line 33
        $this->displayBlock('menu', $context, $blocks);
        // line 45
        echo "     
    ";
        // line 46
        $this->displayBlock('contenido', $context, $blocks);
        // line 49
        echo "
    ";
        // line 50
        $this->displayBlock('pie', $context, $blocks);
        // line 57
        echo "
  ";
    }

    // line 17
    public function block_cabecera($context, array $blocks = array())
    {
        // line 18
        echo "     
      <div class=\"cabecera\">
        <h3 align=\"center\"><a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_homepage");
        echo "\">Aplicación TPV</a></h3>
        (Aquí vendria situado el banner de la tienda)

        <div align=\"right\" id=\"login\"> 
          ";
        // line 24
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 25
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "nombre", array()), "html", null, true);
            echo "
            <a href=\"";
            // line 26
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\">Cerrar sesión </a> 
          ";
        }
        // line 28
        echo "        </div>
      </div>

    ";
    }

    // line 33
    public function block_menu($context, array $blocks = array())
    {
        // line 34
        echo "     <div class=\"barramenu\"> 
       <ul class=\"menu\">  
         <li><a href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_ventas");
        echo "\">venta</a></li> 
         <li><a href=\"";
        // line 37
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_cierre");
        echo "\">cierre</a></li>  
         <li><a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_devolucion");
        echo "\">devolucion</a></li>  
         <li><a href=\"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_gestion");
        echo "\">gestion</a></li>  
         <li><a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_informes");
        echo "\">informes</a></li>  
         <li><a href=\"";
        // line 41
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_cuotas");
        echo "\">cuotas</a></li> 
       </ul>
     </div>
    ";
    }

    // line 46
    public function block_contenido($context, array $blocks = array())
    {
        // line 47
        echo "
    ";
    }

    // line 50
    public function block_pie($context, array $blocks = array())
    {
        // line 51
        echo "
      <div class=\"pie\">
        <div align=\"center\">- pie de página -</div>
      </div>

    ";
    }

    // line 61
    public function block_javascripts($context, array $blocks = array())
    {
        // line 62
        echo "    <script src=\"https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0-rc.0/angular.min.js\"></script>
    <script src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/i52ltpvfrontend/js/scriptrepeat1.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    ";
        // line 65
        echo "  ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  204 => 65,  200 => 63,  197 => 62,  194 => 61,  185 => 51,  182 => 50,  177 => 47,  174 => 46,  166 => 41,  162 => 40,  158 => 39,  154 => 38,  150 => 37,  146 => 36,  142 => 34,  139 => 33,  132 => 28,  127 => 26,  122 => 25,  120 => 24,  113 => 20,  109 => 18,  106 => 17,  101 => 57,  99 => 50,  96 => 49,  94 => 46,  91 => 45,  89 => 33,  86 => 32,  84 => 17,  81 => 16,  78 => 15,  71 => 9,  68 => 8,  62 => 6,  55 => 66,  53 => 61,  49 => 59,  47 => 15,  41 => 11,  39 => 8,  36 => 7,  34 => 6,  27 => 1,);
    }
}
