<?php

/* i52LTPVFrontendBundle:Ventas:articulos.html.twig */
class __TwigTemplate_42a9c6398f17743457b79ea3a4a28a3c438a1e0afdef84b06e1a4323fff41ee5 extends Twig_Template
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
        echo "<div class=\"articuloscaja\">  
  <strong>Artículos</strong>
  <table>
    <tr>
      <th align=center > Nombre 
      <th align=center > Base Imponible
      <th align=center > Tipo IVA
      <th align=center > IVA 
      <th align=center > Precio 
      ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["productos"]) ? $context["productos"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["producto"]) {
            // line 11
            echo "        <tr>
          <td align=left >
          <a href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_aniadearticulo", array("id-articulo" => $this->getAttribute($context["producto"], "id", array()))), "html", null, true);
            echo "\">
            ";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($context["producto"], "nombre", array()), "html", null, true);
            echo " 
          </a>
\t  <td align=center >";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["producto"], "precio", array()), "html", null, true);
            echo "
\t  <td align=center >";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["producto"], "iva", array()), "html", null, true);
            echo "  
\t  <td align=center >";
            // line 18
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute($context["producto"], "precio", array()) * $this->getAttribute($context["producto"], "iva", array())) / 100), 2, ".", ","), "html", null, true);
            echo " 
\t  <td align=center >";
            // line 19
            echo twig_escape_filter($this->env, ($this->getAttribute($context["producto"], "precio", array()) + twig_number_format_filter($this->env, (($this->getAttribute($context["producto"], "precio", array()) * $this->getAttribute($context["producto"], "iva", array())) / 100), 2, ".", ",")), "html", null, true);
            echo "
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['producto'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "  </table>  
</div>
";
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Ventas:articulos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 21,  59 => 19,  55 => 18,  51 => 17,  47 => 16,  42 => 14,  38 => 13,  34 => 11,  30 => 10,  19 => 1,);
    }
}
