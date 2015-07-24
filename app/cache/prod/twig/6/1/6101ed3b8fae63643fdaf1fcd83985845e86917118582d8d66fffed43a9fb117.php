<?php

/* i52LTPVFrontendBundle:Ventas:socio.html.twig */
class __TwigTemplate_6101ed3b8fae63643fdaf1fcd83985845e86917118582d8d66fffed43a9fb117 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"clientecaja\">
<strong>Cliente</strong>
";
        // line 3
        if (((isset($context["concluido"]) ? $context["concluido"] : null) == false)) {
            echo "   
<form id=\"form_buscar\" action=\"";
            // line 4
            echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_aniadecliente");
            echo "\" method=\"post\">
  <strong>Código:</strong>
  <input size=\"2\" name=\"id-socio\" id=\"id-socio\"/>
  <button type=\"submit\" class=\"btn_buscar\"> Buscar</button>
</form>
";
        }
        // line 10
        echo "
<strong> Nombre: </strong> ";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["socio"]) ? $context["socio"] : null), "nombre", array()), "html", null, true);
        echo " 
<strong> DNI: </strong> ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["socio"]) ? $context["socio"] : null), "dni", array()), "html", null, true);
        echo "
<br><strong> Dirección: </strong> ";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["socio"]) ? $context["socio"] : null), "direccion", array()), "html", null, true);
        echo " 
<strong> Población: </strong> ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["socio"]) ? $context["socio"] : null), "poblacion", array()), "html", null, true);
        echo " 
 
<br><strong> Saldo:  </strong> ";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["socio"]) ? $context["socio"] : null), "saldo", array()), "html", null, true);
        echo "

</div>

";
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Ventas:socio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 16,  51 => 14,  47 => 13,  43 => 12,  39 => 11,  36 => 10,  27 => 4,  23 => 3,  19 => 1,);
    }
}
