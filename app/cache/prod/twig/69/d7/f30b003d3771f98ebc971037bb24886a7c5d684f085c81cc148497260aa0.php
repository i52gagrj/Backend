<?php

/* ::layout.html.twig */
class __TwigTemplate_69d7f30b003d3771f98ebc971037bb24886a7c5d684f085c81cc148497260aa0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
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
        echo "<div align=\"center\" id=\"cabecera\">
  <h2><a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_homepage");
        echo "\">Aplicación TPV</a></h2>
(Aquí vendria situado el banner de la tienda)
</div>
<hr/> 
<div align=\"right\" id=\"login\">
    (Aquí se situaria la identidad del usuario conectado y la opción de salir)
</div>

<div align=\"center\" id=\"menu\">
<hr/>  
  <a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_venta");
        echo "\">venta</a> |
  <a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_cierre");
        echo "\">cierre</a> |
  <a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_devolucion");
        echo "\">devolucion</a> |
  <a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_gestion");
        echo "\">gestion</a> |
  <a href=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_informes");
        echo "\">informes</a> |
  <a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_cuotas");
        echo "\">cuotas</a>
<hr/>
</div>

<div id=\"contenido\">
";
        // line 30
        $this->displayBlock('contenido', $context, $blocks);
        // line 33
        echo "</div>

<div id=\"pie\">
<hr/>
<div align=\"center\">- pie de página -</div>
</div>

";
    }

    // line 30
    public function block_contenido($context, array $blocks = array())
    {
        // line 31
        echo "
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
        return array (  112 => 31,  109 => 30,  98 => 33,  96 => 30,  88 => 25,  84 => 24,  80 => 23,  76 => 22,  72 => 21,  68 => 20,  55 => 10,  52 => 9,  49 => 8,  41 => 4,  38 => 3,  11 => 1,);
    }
}
