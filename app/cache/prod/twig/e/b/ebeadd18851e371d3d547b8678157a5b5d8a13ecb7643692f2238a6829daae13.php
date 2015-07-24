<?php

/* i52LTPVFrontendBundle:Ventas:ventas.html.twig */
class __TwigTemplate_ebeadd18851e371d3d547b8678157a5b5d8a13ecb7643692f2238a6829daae13 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("i52LTPVFrontendBundle:Ventas:layout.html.twig", "i52LTPVFrontendBundle:Ventas:ventas.html.twig", 1);
        $this->blocks = array(
            'venta' => array($this, 'block_venta'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "i52LTPVFrontendBundle:Ventas:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_venta($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"cestacaja\"\">
      <strong>Cesta</strong>
      ";
        // line 7
        $context["base21"] = 0;
        // line 8
        echo "      ";
        $context["base10"] = 0;
        // line 9
        echo "      ";
        $context["base4"] = 0;
        // line 10
        echo "      ";
        $context["iva21"] = 0;
        // line 11
        echo "      ";
        $context["iva10"] = 0;
        // line 12
        echo "      ";
        $context["iva4"] = 0;
        // line 13
        echo "      ";
        $context["total"] = 0;
        // line 14
        echo "      <table>
        <tr>
        <th align=left> Artículo
        <th align=right> Base 
        <th align=right> Tipo IVA
        <th align=right> IVA 
        <th align=right> Total
        <th align=right> Cantidad
\t";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cesta"]) ? $context["cesta"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["x"]) {
            // line 23
            echo "\t  <tr> 
          ";
            // line 24
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["productos"]) ? $context["productos"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["producto"]) {
                echo " 
            ";
                // line 25
                if (($this->getAttribute($context["x"], "articulo", array()) == $this->getAttribute($context["producto"], "id", array()))) {
                    echo "  
\t      <td align=left >";
                    // line 26
                    echo twig_escape_filter($this->env, $this->getAttribute($context["producto"], "nombre", array()), "html", null, true);
                    echo "
\t      <td align=right >";
                    // line 27
                    echo twig_escape_filter($this->env, $this->getAttribute($context["producto"], "precio", array()), "html", null, true);
                    echo "
\t      <td align=right >";
                    // line 28
                    echo twig_escape_filter($this->env, $this->getAttribute($context["producto"], "iva", array()), "html", null, true);
                    echo "  
\t      <td align=right >";
                    // line 29
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute($context["producto"], "precio", array()) * $this->getAttribute($context["producto"], "iva", array())) / 100), 2, ".", ","), "html", null, true);
                    echo " 
\t      <td align=right >";
                    // line 30
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["producto"], "precio", array()) + twig_number_format_filter($this->env, (($this->getAttribute($context["producto"], "precio", array()) * $this->getAttribute($context["producto"], "iva", array())) / 100), 2, ".", ",")) * $this->getAttribute($context["x"], "cantidad", array())), "html", null, true);
                    echo "
              <td align=right >
              ";
                    // line 32
                    if (((isset($context["concluido"]) ? $context["concluido"] : null) == true)) {
                        // line 33
                        echo "                ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["x"], "cantidad", array()), "html", null, true);
                        echo "
              ";
                    } else {
                        // line 35
                        echo "                <form id=\"form_cantidad\" action=\"";
                        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_cantidadarticulo");
                        echo "\" method=\"post\">
                  <input size=\"2\" name=\"cantidad\" id=\"cantidad\" value= \"";
                        // line 36
                        echo twig_escape_filter($this->env, $this->getAttribute($context["x"], "cantidad", array()), "html", null, true);
                        echo "\" />
                  <input type=\"hidden\" name=\"id-articulo\" id=\"id-articulo\" value= \"";
                        // line 37
                        echo twig_escape_filter($this->env, $this->getAttribute($context["producto"], "id", array()), "html", null, true);
                        echo "\" />
                  <button type=\"submit\" class=\"btn_cantidad\"> Cambiar</button> 
                </form>           
                <td align=right >
                <a href=\"";
                        // line 41
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_borraarticulo", array("id-articulo" => $this->getAttribute($context["producto"], "id", array()))), "html", null, true);
                        echo "\">
                  <button type=\"submit\" class=\"btn_borrar\"> Borrar</button>
                </a>     
              ";
                    }
                    // line 44
                    echo "                         
              ";
                    // line 45
                    if (($this->getAttribute($context["producto"], "iva", array()) == 21)) {
                        echo "             
                ";
                        // line 46
                        $context["base21"] = ((isset($context["base21"]) ? $context["base21"] : null) + $this->getAttribute($context["producto"], "precio", array()));
                        echo "  
              ";
                    }
                    // line 48
                    echo "              ";
                    if (($this->getAttribute($context["producto"], "iva", array()) == 10)) {
                        echo "             
                ";
                        // line 49
                        $context["base10"] = ((isset($context["base10"]) ? $context["base10"] : null) + $this->getAttribute($context["producto"], "precio", array()));
                        echo "  
              ";
                    }
                    // line 50
                    echo "  
              ";
                    // line 51
                    if (($this->getAttribute($context["producto"], "iva", array()) == 4)) {
                        echo "             
                ";
                        // line 52
                        $context["base4"] = ((isset($context["base4"]) ? $context["base4"] : null) + $this->getAttribute($context["producto"], "precio", array()));
                        echo "  
              ";
                    }
                    // line 53
                    echo "                  
            ";
                }
                // line 55
                echo "          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['producto'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "    
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['x'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "      </table>  

      <form action=\"\">
        ¿Cómo te llamas? <input type=\"text\" ng-model=\"nombre\">
      </form>

    </div>

    <div class=\"totalescaja\">
      ";
        // line 66
        $context["iva21"] = ((isset($context["base21"]) ? $context["base21"] : null) * (21 / 100));
        // line 67
        echo "      ";
        $context["iva10"] = ((isset($context["base10"]) ? $context["base10"] : null) * (10 / 100));
        // line 68
        echo "      ";
        $context["iva4"] = ((isset($context["base4"]) ? $context["base4"] : null) * (4 / 100));
        // line 69
        echo "      <strong>TOTALES</strong>
      <br> 
      <strong>BASE 21: </strong>";
        // line 71
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["base21"]) ? $context["base21"] : null), 2, ".", ","), "html", null, true);
        echo " -
      <strong>BASE 10: </strong>";
        // line 72
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["base10"]) ? $context["base10"] : null), 2, ".", ","), "html", null, true);
        echo " -
      <strong>BASE 4: </strong>";
        // line 73
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["base4"]) ? $context["base4"] : null), 2, ".", ","), "html", null, true);
        echo "      
      <br>
      <strong>IVA 21: </strong>";
        // line 75
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["iva21"]) ? $context["iva21"] : null), 2, ".", ","), "html", null, true);
        echo " -
      <strong>IVA 10: </strong>";
        // line 76
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["iva10"]) ? $context["iva10"] : null), 2, ".", ","), "html", null, true);
        echo " -
      <strong>IVA 4: </strong>";
        // line 77
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["iva4"]) ? $context["iva4"] : null), 2, ".", ","), "html", null, true);
        echo "
      <br><strong>TOTAL: </strong>";
        // line 78
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ((((((isset($context["base21"]) ? $context["base21"] : null) + (isset($context["base10"]) ? $context["base10"] : null)) + (isset($context["base4"]) ? $context["base4"] : null)) + (isset($context["iva21"]) ? $context["iva21"] : null)) + (isset($context["iva10"]) ? $context["iva10"] : null)) + (isset($context["iva4"]) ? $context["iva4"] : null)), 2, ".", ","), "html", null, true);
        echo "
      ";
        // line 79
        if (((isset($context["concluido"]) ? $context["concluido"] : null) == false)) {
            // line 80
            echo "        <form id=\"pago\" action=\"";
            echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_cierraventa");
            echo "\" method=\"post\">
          ";
            // line 81
            if (($this->getAttribute((isset($context["socio"]) ? $context["socio"] : null), "id", array()) != "1")) {
                // line 82
                echo "            <input type=\"radio\" name=\"tipo-pago\" value=\"prepago\"> Prepago
          ";
            }
            // line 84
            echo "          <input type=\"radio\" name=\"tipo-pago\" value=\"contado\" checked> Contado          
          <button type=\"submit\" class=\"btn_borrar\"> Finalizar </button> 
        </form>  
      ";
        }
        // line 87
        echo "   
    </div>     

  ";
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Ventas:ventas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  256 => 87,  250 => 84,  246 => 82,  244 => 81,  239 => 80,  237 => 79,  233 => 78,  229 => 77,  225 => 76,  221 => 75,  216 => 73,  212 => 72,  208 => 71,  204 => 69,  201 => 68,  198 => 67,  196 => 66,  185 => 57,  173 => 55,  169 => 53,  164 => 52,  160 => 51,  157 => 50,  152 => 49,  147 => 48,  142 => 46,  138 => 45,  135 => 44,  128 => 41,  121 => 37,  117 => 36,  112 => 35,  106 => 33,  104 => 32,  99 => 30,  95 => 29,  91 => 28,  87 => 27,  83 => 26,  79 => 25,  73 => 24,  70 => 23,  66 => 22,  56 => 14,  53 => 13,  50 => 12,  47 => 11,  44 => 10,  41 => 9,  38 => 8,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }
}
