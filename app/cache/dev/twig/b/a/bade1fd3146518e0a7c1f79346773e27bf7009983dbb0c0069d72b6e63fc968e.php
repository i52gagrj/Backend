<?php

/* i52LTPVFrontendBundle:Cierres:desglose.html.twig */
class __TwigTemplate_bade1fd3146518e0a7c1f79346773e27bf7009983dbb0c0069d72b6e63fc968e extends Twig_Template
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
        echo "<div class=\"desglosecaja\">
  <strong>INGRESOS</strong>
  <br>
  <strong>En efectivo: </strong>
  ";
        // line 5
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["contado"]) ? $context["contado"] : $this->getContext($context, "contado")), 2, ".", ","), "html", null, true);
        echo "
  <strong>En prepago: </strong>
  ";
        // line 7
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["prepago"]) ? $context["prepago"] : $this->getContext($context, "prepago")), 2, ".", ","), "html", null, true);
        echo "
  <br><br>
  <strong>DESGLOSE DEL IVA</strong>
  <br> 
  <strong>Base Imponible 21%: </strong>
  ";
        // line 12
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["base21"]) ? $context["base21"] : $this->getContext($context, "base21")), 2, ".", ","), "html", null, true);
        echo " 
  <strong>IVA 21%: </strong>
  ";
        // line 14
        echo twig_escape_filter($this->env, ((isset($context["base21"]) ? $context["base21"] : $this->getContext($context, "base21")) * twig_number_format_filter($this->env, (21 / 100), 2, ".", ",")), "html", null, true);
        echo "
  <br>
  <strong>Base Imponible 10%: </strong>
  ";
        // line 17
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["base10"]) ? $context["base10"] : $this->getContext($context, "base10")), 2, ".", ","), "html", null, true);
        echo "
  <strong>IVA 10%: </strong>
  ";
        // line 19
        echo twig_escape_filter($this->env, ((isset($context["base10"]) ? $context["base10"] : $this->getContext($context, "base10")) * twig_number_format_filter($this->env, (10 / 100), 2, ".", ",")), "html", null, true);
        echo "
  <br> 
  <strong>Base Imponible 4%: </strong>
  ";
        // line 22
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["base4"]) ? $context["base4"] : $this->getContext($context, "base4")), 2, ".", ","), "html", null, true);
        echo "
  <strong>IVA 21%: </strong>
  ";
        // line 24
        echo twig_escape_filter($this->env, ((isset($context["base4"]) ? $context["base4"] : $this->getContext($context, "base4")) * twig_number_format_filter($this->env, (4 / 100), 2, ".", ",")), "html", null, true);
        echo "
  
</div>


";
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Cierres:desglose.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 24,  60 => 22,  54 => 19,  49 => 17,  43 => 14,  38 => 12,  30 => 7,  25 => 5,  19 => 1,);
    }
}
