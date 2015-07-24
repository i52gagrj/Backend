<?php

/* i52LTPVFrontendBundle:Cierres:ventas.html.twig */
class __TwigTemplate_bee638012c43e8afdaa21cb46cc6a4f6763f418db16c6db23614cee698a63e7c extends Twig_Template
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
        echo "<div class=\"ventascaja\">  
  <strong>Ventas del dia</strong>
  <table>
    <tr>
      <th align=center > Nº de Venta 
      <th align=center > Fecha de venta
      <th align=center > Fecha de venta 
      <th align=center > Cliente
      <th align=center > Contado
    </tr>
    ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ventas"]) ? $context["ventas"] : $this->getContext($context, "ventas")));
        foreach ($context['_seq'] as $context["_key"] => $context["venta"]) {
            // line 12
            echo "      <tr>
        <td align=center >
        <a href=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_muestraventa", array("num-venta" => $this->getAttribute($context["venta"], "id", array()))), "html", null, true);
            echo "\">
          ";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["venta"], "id", array()), "html", null, true);
            echo " 
        </a>
\t<td align=center >";
            // line 17
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["venta"], "fechaventa", array()), "Y-m-d"), "html", null, true);
            echo "
        <td align=center >";
            // line 18
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["venta"], "horaventa", array()), "H:i:s"), "html", null, true);
            echo "
\t<td align=center >";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["venta"], "socio", array()), "nombre", array()), "html", null, true);
            echo "  
\t<td align=center >
        ";
            // line 21
            if ($this->getAttribute($context["venta"], "contado", array())) {
                echo " Si
        ";
            } else {
                // line 22
                echo " No
        ";
            }
            // line 24
            echo "        <br>
      </tr>
      ";
            // line 26
            if ((isset($context["listaventa"]) ? $context["listaventa"] : $this->getContext($context, "listaventa"))) {
                echo " 
        ";
                // line 27
                if (((isset($context["numventa"]) ? $context["numventa"] : $this->getContext($context, "numventa")) == $this->getAttribute($context["venta"], "id", array()))) {
                    // line 28
                    echo "          <tr>           
            <table>
              <tr>
                <th align=left > Producto 
                <th align=center > Precio 
                <th align=center > IVA
                <th align=center > Cantidad
                <th align=center > Precio total
                <th align=center > IVA total
              </tr> 
              ";
                    // line 38
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["listaventa"]) ? $context["listaventa"] : $this->getContext($context, "listaventa")));
                    foreach ($context['_seq'] as $context["_key"] => $context["linea"]) {
                        // line 39
                        echo "                <tr>
                  <td align=center >";
                        // line 40
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["linea"], "producto", array()), "nombre", array()), "html", null, true);
                        echo "  
                  <td align=center >";
                        // line 41
                        echo twig_escape_filter($this->env, $this->getAttribute($context["linea"], "precio", array()), "html", null, true);
                        echo "  
                  <td align=center >";
                        // line 42
                        echo twig_escape_filter($this->env, $this->getAttribute($context["linea"], "iva", array()), "html", null, true);
                        echo "
                  <td align=center >";
                        // line 43
                        echo twig_escape_filter($this->env, $this->getAttribute($context["linea"], "cantidad", array()), "html", null, true);
                        echo "  
                  <td align=center >";
                        // line 44
                        echo twig_escape_filter($this->env, ($this->getAttribute($context["linea"], "precio", array()) * twig_number_format_filter($this->env, $this->getAttribute($context["linea"], "cantidad", array()), 2, ".", ",")), "html", null, true);
                        echo "
                  <td align=center >";
                        // line 45
                        echo twig_escape_filter($this->env, ($this->getAttribute($context["linea"], "precio", array()) * twig_number_format_filter($this->env, (1 + ($this->getAttribute($context["linea"], "iva", array()) / 100)), 2, ".", ",")), "html", null, true);
                        echo " 
                </tr> 
              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['linea'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 48
                    echo "            </table>
          </tr>
          ";
                }
                // line 51
                echo "        ";
            }
            // line 52
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['venta'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "  </table>  

  <div>
    <div ng-repeat=\"alumno in alumnos\">
      <div> ";
        // line 57
        echo "{{alumno.nombre}} - {{alumno.telefono}}";
        echo "</div>
      <span>";
        // line 58
        echo "{{alumno.curso}}";
        echo "</span>
    </div>
  </div> 

</div>
";
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Cierres:ventas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 58,  148 => 57,  142 => 53,  136 => 52,  133 => 51,  128 => 48,  119 => 45,  115 => 44,  111 => 43,  107 => 42,  103 => 41,  99 => 40,  96 => 39,  92 => 38,  80 => 28,  78 => 27,  74 => 26,  70 => 24,  66 => 22,  61 => 21,  56 => 19,  52 => 18,  48 => 17,  43 => 15,  39 => 14,  35 => 12,  31 => 11,  19 => 1,);
    }
}
