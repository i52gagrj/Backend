<?php

/* i52LTPVFrontendBundle:Devolucion:original.html.twig */
class __TwigTemplate_e27dd98d3d8bb46565e04d29d4c7c7f10d6063083ead5bdc6d227f1504a0a536 extends Twig_Template
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
        echo "<div class=\"ventascaja\" >

  ";
        // line 3
        if ((isset($context["venta"]) ? $context["venta"] : null)) {
            echo "   
    ";
            // line 4
            $context["base21"] = 0;
            // line 5
            echo "    ";
            $context["base10"] = 0;
            // line 6
            echo "    ";
            $context["base4"] = 0;
            // line 7
            echo "    ";
            $context["iva21"] = 0;
            // line 8
            echo "    ";
            $context["iva10"] = 0;
            // line 9
            echo "    ";
            $context["iva4"] = 0;
            // line 10
            echo "    ";
            $context["total"] = 0;
            // line 11
            echo "    <strong>Cliente</strong><br>
    <strong> Nombre: </strong> ";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["venta"]) ? $context["venta"] : null), "socio", array()), "nombre", array()), "html", null, true);
            echo "
    <strong> DNI: </strong> ";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["venta"]) ? $context["venta"] : null), "socio", array()), "dni", array()), "html", null, true);
            echo "<br>
    <strong> Vendedor: </strong> ";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["venta"]) ? $context["venta"] : null), "usuario", array()), "nombre", array()), "html", null, true);
            echo "<br><br> 

    <strong>Venta original</strong><br>
    <strong> Fecha de venta: </strong> ";
            // line 17
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["venta"]) ? $context["venta"] : null), "fechaventa", array()), "Y-m-d"), "html", null, true);
            echo "
    <strong> Hora de venta: </strong> ";
            // line 18
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["venta"]) ? $context["venta"] : null), "horaventa", array()), "H:i:s"), "html", null, true);
            echo "
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
            // line 28
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["listaventa"]) ? $context["listaventa"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["linea"]) {
                // line 29
                echo "        <tr>
          <td align=center >";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["linea"], "producto", array()), "nombre", array()), "html", null, true);
                echo "  
          <td align=center >";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($context["linea"], "precio", array()), "html", null, true);
                echo "  
          <td align=center >";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($context["linea"], "iva", array()), "html", null, true);
                echo "
          ";
                // line 33
                if (($this->getAttribute($context["linea"], "iva", array()) == 21)) {
                    echo "             
            ";
                    // line 34
                    $context["base21"] = ((isset($context["base21"]) ? $context["base21"] : null) + ($this->getAttribute($context["linea"], "precio", array()) * $this->getAttribute($context["linea"], "cantidad", array())));
                    echo "  
          ";
                }
                // line 36
                echo "          ";
                if (($this->getAttribute($context["linea"], "iva", array()) == 10)) {
                    echo "             
            ";
                    // line 37
                    $context["base10"] = ((isset($context["base10"]) ? $context["base10"] : null) + ($this->getAttribute($context["linea"], "precio", array()) * $this->getAttribute($context["linea"], "cantidad", array())));
                    echo "  
          ";
                }
                // line 38
                echo "  
          ";
                // line 39
                if (($this->getAttribute($context["linea"], "iva", array()) == 4)) {
                    echo "             
            ";
                    // line 40
                    $context["base4"] = ((isset($context["base4"]) ? $context["base4"] : null) + ($this->getAttribute($context["linea"], "precio", array()) * $this->getAttribute($context["linea"], "cantidad", array())));
                    echo "  
          ";
                }
                // line 41
                echo " 
          <td align=center >";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute($context["linea"], "cantidad", array()), "html", null, true);
                echo "  
          <td align=center >";
                // line 43
                echo twig_escape_filter($this->env, ($this->getAttribute($context["linea"], "precio", array()) * twig_number_format_filter($this->env, $this->getAttribute($context["linea"], "cantidad", array()), 2, ".", ",")), "html", null, true);
                echo "
          <td align=center >";
                // line 44
                echo twig_escape_filter($this->env, ($this->getAttribute($context["linea"], "precio", array()) * twig_number_format_filter($this->env, (1 + ($this->getAttribute($context["linea"], "iva", array()) / 100)), 2, ".", ",")), "html", null, true);
                echo " 
        </tr> 
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['linea'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "    </table> 
    ";
            // line 48
            $context["iva21"] = ((isset($context["base21"]) ? $context["base21"] : null) * twig_number_format_filter($this->env, (21 / 100), 2, ".", ","));
            // line 49
            echo "    ";
            $context["iva10"] = ((isset($context["base10"]) ? $context["base10"] : null) * twig_number_format_filter($this->env, (10 / 100), 2, ".", ","));
            // line 50
            echo "    ";
            $context["iva4"] = ((isset($context["base4"]) ? $context["base4"] : null) * twig_number_format_filter($this->env, (4 / 100), 2, ".", ","));
            // line 51
            echo "    <br> 
    <strong>Desglose</strong>  
    <br>
    <strong>Base Imponible 21%: </strong>
    ";
            // line 55
            echo twig_escape_filter($this->env, (isset($context["base21"]) ? $context["base21"] : null), "html", null, true);
            echo " 
    <strong>IVA 21%: </strong>
    ";
            // line 57
            echo twig_escape_filter($this->env, ((isset($context["base21"]) ? $context["base21"] : null) * twig_number_format_filter($this->env, (21 / 100), 2, ".", ",")), "html", null, true);
            echo "
    <br>
    <strong>Base Imponible 10%: </strong>
    ";
            // line 60
            echo twig_escape_filter($this->env, (isset($context["base10"]) ? $context["base10"] : null), "html", null, true);
            echo "
    <strong>IVA 10%: </strong>
    ";
            // line 62
            echo twig_escape_filter($this->env, ((isset($context["base10"]) ? $context["base10"] : null) * twig_number_format_filter($this->env, (10 / 100), 2, ".", ",")), "html", null, true);
            echo "
    <br> 
    <strong>Base Imponible 4%: </strong>
    ";
            // line 65
            echo twig_escape_filter($this->env, (isset($context["base4"]) ? $context["base4"] : null), "html", null, true);
            echo "
    <strong>IVA 21%: </strong>
    ";
            // line 67
            echo twig_escape_filter($this->env, ((isset($context["base4"]) ? $context["base4"] : null) * twig_number_format_filter($this->env, (4 / 100), 2, ".", ",")), "html", null, true);
            echo "
    <br>
    <strong>TOTAL: </strong>
    ";
            // line 70
            echo twig_escape_filter($this->env, (isset($context["totaloriginal"]) ? $context["totaloriginal"] : null), "html", null, true);
            echo "  

  ";
        } else {
            // line 73
            echo "  <strong>Id de la venta:</strong>
  <form id=\"form_buscar\" action=\"";
            // line 74
            echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_buscaventa");
            echo "\" method=\"post\">
    <input size=\"2\" name=\"id-venta\" id=\"id-venta\"/>
    <button type=\"submit\" class=\"btn_buscar\"> Buscar </button>
  </form>

  ";
        }
        // line 79
        echo "   
 
</div>     


";
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Devolucion:original.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  219 => 79,  210 => 74,  207 => 73,  201 => 70,  195 => 67,  190 => 65,  184 => 62,  179 => 60,  173 => 57,  168 => 55,  162 => 51,  159 => 50,  156 => 49,  154 => 48,  151 => 47,  142 => 44,  138 => 43,  134 => 42,  131 => 41,  126 => 40,  122 => 39,  119 => 38,  114 => 37,  109 => 36,  104 => 34,  100 => 33,  96 => 32,  92 => 31,  88 => 30,  85 => 29,  81 => 28,  68 => 18,  64 => 17,  58 => 14,  54 => 13,  50 => 12,  47 => 11,  44 => 10,  41 => 9,  38 => 8,  35 => 7,  32 => 6,  29 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }
}
