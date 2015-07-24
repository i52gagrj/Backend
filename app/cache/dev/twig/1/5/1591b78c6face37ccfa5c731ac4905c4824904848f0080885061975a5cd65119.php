<?php

/* i52LTPVFrontendBundle:Devolucion:devolucion.html.twig */
class __TwigTemplate_1591b78c6face37ccfa5c731ac4905c4824904848f0080885061975a5cd65119 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("i52LTPVFrontendBundle:Devolucion:layout.html.twig", "i52LTPVFrontendBundle:Devolucion:devolucion.html.twig", 1);
        $this->blocks = array(
            'devolucion' => array($this, 'block_devolucion'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "i52LTPVFrontendBundle:Devolucion:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_devolucion($context, array $blocks = array())
    {
        echo " 

    ";
        // line 5
        if ((isset($context["cesta"]) ? $context["cesta"] : $this->getContext($context, "cesta"))) {
            // line 6
            echo "    <div class=\"cestacaja\" >
      <strong>Venta corregida</strong>
      ";
            // line 8
            $context["base21"] = 0;
            // line 9
            echo "      ";
            $context["base10"] = 0;
            // line 10
            echo "      ";
            $context["base4"] = 0;
            // line 11
            echo "      ";
            $context["iva21"] = 0;
            // line 12
            echo "      ";
            $context["iva10"] = 0;
            // line 13
            echo "      ";
            $context["iva4"] = 0;
            // line 14
            echo "      ";
            $context["total"] = 0;
            // line 15
            echo "      <table>
        <tr>
        ";
            // line 17
            if (((isset($context["finalizado"]) ? $context["finalizado"] : $this->getContext($context, "finalizado")) == false)) {
                echo " 
          <th align=left> Id 
        ";
            }
            // line 20
            echo "        <th align=left> Artículo
        <th align=right> Base 
        <th align=right> Tipo IVA
        <th align=right> IVA 
        <th align=right> Total
        <th align=right> Cantidad
\t";
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["cesta"]) ? $context["cesta"] : $this->getContext($context, "cesta")));
            foreach ($context['_seq'] as $context["_key"] => $context["x"]) {
                // line 27
                echo "          ";
                if (($this->getAttribute($context["x"], "cantidad", array()) != 0)) {
                    echo "          
\t  <tr> 
            ";
                    // line 29
                    if (((isset($context["finalizado"]) ? $context["finalizado"] : $this->getContext($context, "finalizado")) == false)) {
                        // line 30
                        echo "              <td align=center >
              <form id=\"form_cantidad\" action=\"";
                        // line 31
                        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_cambiarproducto");
                        echo "\" method=\"post\">
                <input size=\"2\" name=\"id-producto\" id=\"id-producto\" value= \"";
                        // line 32
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["x"], "producto", array()), "id", array()), "html", null, true);
                        echo "\" />
                <input type=\"hidden\" name=\"id-linea\" id=\"id-linea\" value= \"";
                        // line 33
                        echo twig_escape_filter($this->env, $this->getAttribute($context["x"], "id", array()), "html", null, true);
                        echo "\" />
                <button type=\"submit\" class=\"btn_producto\">Cambiar</button> 
              </form>            
            ";
                    }
                    // line 37
                    echo "              <td align=left >";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["x"], "producto", array()), "nombre", array()), "html", null, true);
                    echo "
              <td align=right >";
                    // line 38
                    echo twig_escape_filter($this->env, $this->getAttribute($context["x"], "precio", array()), "html", null, true);
                    echo "
              <td align=right >";
                    // line 39
                    echo twig_escape_filter($this->env, $this->getAttribute($context["x"], "iva", array()), "html", null, true);
                    echo "  
\t      <td align=right >";
                    // line 40
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute($context["x"], "precio", array()) * $this->getAttribute($context["x"], "iva", array())) / 100), 2, ".", ","), "html", null, true);
                    echo " 
\t      <td align=right >";
                    // line 41
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["x"], "precio", array()) + twig_number_format_filter($this->env, (($this->getAttribute($context["x"], "precio", array()) * $this->getAttribute($context["x"], "iva", array())) / 100), 2, ".", ",")) * $this->getAttribute($context["x"], "cantidad", array())), "html", null, true);
                    echo "
              <td align=right >
              ";
                    // line 43
                    if (((isset($context["finalizado"]) ? $context["finalizado"] : $this->getContext($context, "finalizado")) == false)) {
                        echo " 
            <form id=\"form_cantidad\" action=\"";
                        // line 44
                        echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_cambiarcantidad");
                        echo "\" method=\"post\">
              <input size=\"3\" name=\"cantidad\" id=\"cantidad\" size=\"2\" value= \"";
                        // line 45
                        echo twig_escape_filter($this->env, $this->getAttribute($context["x"], "cantidad", array()), "html", null, true);
                        echo "\" />
              <input type=\"hidden\" name=\"id-linea\" id=\"id-linea\" value= \"";
                        // line 46
                        echo twig_escape_filter($this->env, $this->getAttribute($context["x"], "id", array()), "html", null, true);
                        echo "\" />
              <button type=\"submit\" class=\"btn_cantidad\"> Cambiar</button> 
            </form>           
            <td align=right >
            <a href=\"";
                        // line 50
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_eliminaarticulo", array("id-linea" => $this->getAttribute($context["x"], "id", array()))), "html", null, true);
                        echo "\">
              <button type=\"submit\" class=\"btn_borrar\"> Borrar</button>
            </a>     
            ";
                    } else {
                        // line 53
                        echo "              
            <td align=right >";
                        // line 54
                        echo twig_escape_filter($this->env, $this->getAttribute($context["x"], "cantidad", array()), "html", null, true);
                        echo "
            ";
                    }
                    // line 56
                    echo "          ";
                    if (($this->getAttribute($context["x"], "iva", array()) == 21)) {
                        echo "             
            ";
                        // line 57
                        $context["base21"] = ((isset($context["base21"]) ? $context["base21"] : $this->getContext($context, "base21")) + ($this->getAttribute($context["x"], "precio", array()) * $this->getAttribute($context["x"], "cantidad", array())));
                        echo "  
          ";
                    }
                    // line 59
                    echo "          ";
                    if (($this->getAttribute($context["x"], "iva", array()) == 10)) {
                        echo "             
            ";
                        // line 60
                        $context["base10"] = ((isset($context["base10"]) ? $context["base10"] : $this->getContext($context, "base10")) + ($this->getAttribute($context["x"], "precio", array()) * $this->getAttribute($context["x"], "cantidad", array())));
                        echo "  
          ";
                    }
                    // line 61
                    echo "  
          ";
                    // line 62
                    if (($this->getAttribute($context["x"], "iva", array()) == 4)) {
                        echo "             
            ";
                        // line 63
                        $context["base4"] = ((isset($context["base4"]) ? $context["base4"] : $this->getContext($context, "base4")) + ($this->getAttribute($context["x"], "precio", array()) * $this->getAttribute($context["x"], "cantidad", array())));
                        echo "  
          ";
                    }
                    // line 64
                    echo "           
          ";
                }
                // line 65
                echo "                
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['x'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "      </table>  
    </div>

    <div class=\"totalescaja\">
      ";
            // line 71
            $context["iva21"] = ((isset($context["base21"]) ? $context["base21"] : $this->getContext($context, "base21")) * twig_number_format_filter($this->env, (21 / 100), 2, ".", ","));
            // line 72
            echo "      ";
            $context["iva10"] = ((isset($context["base10"]) ? $context["base10"] : $this->getContext($context, "base10")) * twig_number_format_filter($this->env, (10 / 100), 2, ".", ","));
            // line 73
            echo "      ";
            $context["iva4"] = ((isset($context["base4"]) ? $context["base4"] : $this->getContext($context, "base4")) * twig_number_format_filter($this->env, (4 / 100), 2, ".", ","));
            // line 74
            echo "      <strong>TOTALES</strong>
      <br> 
      <strong>BASE 21: </strong>";
            // line 76
            echo twig_escape_filter($this->env, (isset($context["base21"]) ? $context["base21"] : $this->getContext($context, "base21")), "html", null, true);
            echo " -
      <strong>BASE 10: </strong>";
            // line 77
            echo twig_escape_filter($this->env, (isset($context["base10"]) ? $context["base10"] : $this->getContext($context, "base10")), "html", null, true);
            echo " -
      <strong>BASE 4: </strong>";
            // line 78
            echo twig_escape_filter($this->env, (isset($context["base4"]) ? $context["base4"] : $this->getContext($context, "base4")), "html", null, true);
            echo "      
      <br>
      <strong>IVA 21: </strong>";
            // line 80
            echo twig_escape_filter($this->env, (isset($context["iva21"]) ? $context["iva21"] : $this->getContext($context, "iva21")), "html", null, true);
            echo " -
      <strong>IVA 10: </strong>";
            // line 81
            echo twig_escape_filter($this->env, (isset($context["iva10"]) ? $context["iva10"] : $this->getContext($context, "iva10")), "html", null, true);
            echo " -
      <strong>IVA 4: </strong>";
            // line 82
            echo twig_escape_filter($this->env, (isset($context["iva4"]) ? $context["iva4"] : $this->getContext($context, "iva4")), "html", null, true);
            echo "
      <br><strong>TOTAL: </strong>";
            // line 83
            echo twig_escape_filter($this->env, ((((((isset($context["base21"]) ? $context["base21"] : $this->getContext($context, "base21")) + (isset($context["base10"]) ? $context["base10"] : $this->getContext($context, "base10"))) + (isset($context["base4"]) ? $context["base4"] : $this->getContext($context, "base4"))) + (isset($context["iva21"]) ? $context["iva21"] : $this->getContext($context, "iva21"))) + (isset($context["iva10"]) ? $context["iva10"] : $this->getContext($context, "iva10"))) + (isset($context["iva4"]) ? $context["iva4"] : $this->getContext($context, "iva4"))), "html", null, true);
            echo "
      <strong>DIFERENCIA: </strong>";
            // line 84
            echo twig_escape_filter($this->env, abs(((isset($context["totaloriginal"]) ? $context["totaloriginal"] : $this->getContext($context, "totaloriginal")) - (isset($context["totalnuevo"]) ? $context["totalnuevo"] : $this->getContext($context, "totalnuevo")))), "html", null, true);
            echo "
      ";
            // line 85
            if ((((isset($context["totaloriginal"]) ? $context["totaloriginal"] : $this->getContext($context, "totaloriginal")) - (isset($context["totalnuevo"]) ? $context["totalnuevo"] : $this->getContext($context, "totalnuevo"))) > 0)) {
                echo " a devolver ";
            }
            // line 86
            echo "      ";
            if ((((isset($context["totaloriginal"]) ? $context["totaloriginal"] : $this->getContext($context, "totaloriginal")) - (isset($context["totalnuevo"]) ? $context["totalnuevo"] : $this->getContext($context, "totalnuevo"))) < 0)) {
                echo " a pagar ";
            }
            // line 87
            echo "      ";
            if (((isset($context["finalizado"]) ? $context["finalizado"] : $this->getContext($context, "finalizado")) == false)) {
                // line 88
                echo "        <form id=\"pago\" action=\"";
                echo $this->env->getExtension('routing')->getPath("i52_ltpv_frontend_ejecutadevolucion");
                echo "\" method=\"post\">       
          <button type=\"submit\" class=\"btn_finalizar\"> Finalizar </button> 
        </form>  
      ";
            }
            // line 92
            echo "    </div>
    ";
        }
        // line 94
        echo "
  ";
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Devolucion:devolucion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  282 => 94,  278 => 92,  270 => 88,  267 => 87,  262 => 86,  258 => 85,  254 => 84,  250 => 83,  246 => 82,  242 => 81,  238 => 80,  233 => 78,  229 => 77,  225 => 76,  221 => 74,  218 => 73,  215 => 72,  213 => 71,  207 => 67,  200 => 65,  196 => 64,  191 => 63,  187 => 62,  184 => 61,  179 => 60,  174 => 59,  169 => 57,  164 => 56,  159 => 54,  156 => 53,  149 => 50,  142 => 46,  138 => 45,  134 => 44,  130 => 43,  125 => 41,  121 => 40,  117 => 39,  113 => 38,  108 => 37,  101 => 33,  97 => 32,  93 => 31,  90 => 30,  88 => 29,  82 => 27,  78 => 26,  70 => 20,  64 => 17,  60 => 15,  57 => 14,  54 => 13,  51 => 12,  48 => 11,  45 => 10,  42 => 9,  40 => 8,  36 => 6,  34 => 5,  28 => 3,  11 => 1,);
    }
}
