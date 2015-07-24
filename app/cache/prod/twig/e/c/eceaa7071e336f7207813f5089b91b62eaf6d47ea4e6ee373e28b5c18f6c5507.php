<?php

/* i52LTPVBackendBundle:Cuotas:cuotas.html.twig */
class __TwigTemplate_eceaa7071e336f7207813f5089b91b62eaf6d47ea4e6ee373e28b5c18f6c5507 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("i52LTPVBackendBundle:Cuotas:layout.html.twig", "i52LTPVBackendBundle:Cuotas:cuotas.html.twig", 1);
        $this->blocks = array(
            'cuotas' => array($this, 'block_cuotas'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "i52LTPVBackendBundle:Cuotas:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_cuotas($context, array $blocks = array())
    {
        echo " 
    <div class=\"contenido\" >
      <strong>Listado de cuotas a cargar</strong>
      <table>
        <tr>
          <th align=center> Id 
          <th align=center> Nombre
          <th align=center> Saldo
          <th align=center> Cuota
        </tr>
    \t";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listado"]) ? $context["listado"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["x"]) {
            echo " 
        ";
            // line 14
            if (($this->getAttribute($context["x"], "id", array()) != 1)) {
                echo "    
\t<tr> 
          <td align=center >";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($context["x"], "id", array()), "html", null, true);
                echo "
          <td align=center >";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($context["x"], "nombre", array()), "html", null, true);
                echo "
          <td align=center >";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute($context["x"], "saldo", array()), "html", null, true);
                echo "  
          ";
                // line 19
                if (((isset($context["finalizado"]) ? $context["finalizado"] : null) == false)) {
                    echo " 
          <td align=center >
            <form id=\"form_cantidad\" action=\"";
                    // line 21
                    echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_cambiacuota");
                    echo "\" method=\"post\">
              <input size=\"3\" name=\"cuota\" id=\"cuota\" value= \"";
                    // line 22
                    echo twig_escape_filter($this->env, $this->getAttribute($context["x"], "cuota", array()), "html", null, true);
                    echo "\" />
              <input type=\"hidden\" name=\"idsocio\" id=\"idsocio\" value= \"";
                    // line 23
                    echo twig_escape_filter($this->env, $this->getAttribute($context["x"], "id", array()), "html", null, true);
                    echo "\" />
              <button type=\"submit\" class=\"btn_cantidad\"> Cambiar</button> 
            </form>           
          ";
                } else {
                    // line 26
                    echo "              
            <td align=center > --
          ";
                }
                // line 28
                echo "   
        ";
            }
            // line 29
            echo "                         
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['x'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "      </table>  
      ";
        // line 32
        if (((isset($context["finalizado"]) ? $context["finalizado"] : null) == false)) {
            // line 33
            echo "        <br><br>
        <form id=\"finalizarcuota\" action=\"";
            // line 34
            echo $this->env->getExtension('routing')->getPath("i52_ltpv_backend_finalizacuotas");
            echo "\" method=\"post\">       
          <button type=\"submit\" class=\"btn_finalizar\"> Finalizar </button> 
        </form>  
      ";
        }
        // line 38
        echo "    </div>

  ";
    }

    public function getTemplateName()
    {
        return "i52LTPVBackendBundle:Cuotas:cuotas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 38,  109 => 34,  106 => 33,  104 => 32,  101 => 31,  94 => 29,  90 => 28,  85 => 26,  78 => 23,  74 => 22,  70 => 21,  65 => 19,  61 => 18,  57 => 17,  53 => 16,  48 => 14,  42 => 13,  28 => 3,  11 => 1,);
    }
}
