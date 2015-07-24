<?php

/* i52LTPVFrontendBundle:Cierres:cierres.html.twig */
class __TwigTemplate_2668def4509df4c6e9f0889d6736ef40e474b0e2c48b46efe37a8ba85d8b7d35 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("i52LTPVFrontendBundle:Cierres:layout.html.twig", "i52LTPVFrontendBundle:Cierres:cierres.html.twig", 1);
        $this->blocks = array(
            'cierre' => array($this, 'block_cierre'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "i52LTPVFrontendBundle:Cierres:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_cierre($context, array $blocks = array())
    {
        echo " 
    <div class=\"cierrecaja\" >
      <strong>Cantidad en caja: </strong>
      ";
        // line 6
        if ((isset($context["anterior"]) ? $context["anterior"] : $this->getContext($context, "anterior"))) {
            // line 7
            echo "        ";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ((isset($context["contado"]) ? $context["contado"] : $this->getContext($context, "contado")) + $this->getAttribute((isset($context["anterior"]) ? $context["anterior"] : $this->getContext($context, "anterior")), "dejado", array())), 2, ".", ","), "html", null, true);
            echo "
      ";
        } else {
            // line 8
            echo " 
        ";
            // line 9
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["contado"]) ? $context["contado"] : $this->getContext($context, "contado")), 2, ".", ","), "html", null, true);
            echo "
      ";
        }
        // line 11
        echo "      <p>
      <strong>Cierre</strong>
      <br> 
      ";
        // line 14
        if ((isset($context["hoy"]) ? $context["hoy"] : $this->getContext($context, "hoy"))) {
            // line 15
            echo "        <strong>Dia cerrado</strong>
        <br>
        <strong>Fecha:</strong>
        ";
            // line 18
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["hoy"]) ? $context["hoy"] : $this->getContext($context, "hoy")), "fecha", array()), "Y-m-d"), "html", null, true);
            echo "
        <br>
        <strong>Resto:</strong>
        ";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hoy"]) ? $context["hoy"] : $this->getContext($context, "hoy")), "dejado", array()), "html", null, true);
            echo "      
      ";
        } else {
            // line 22
            echo "        
        <form id=\"mandarresto\" action=\"";
            // line 23
            echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_ejecutacierre");
            echo "\" method=\"post\">
          <strong>Cantidad a dejar en caja:</strong>
          <input type=\"text\" size=\"6\" name=\"resto\" >          
          <button type=\"submit\" class=\"btn_borrar\"> Finalizar </button> 
        </form>  
      ";
        }
        // line 28
        echo "   
    </div>     

  ";
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Cierres:cierres.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 28,  77 => 23,  74 => 22,  69 => 21,  63 => 18,  58 => 15,  56 => 14,  51 => 11,  46 => 9,  43 => 8,  37 => 7,  35 => 6,  28 => 3,  11 => 1,);
    }
}
