<?php

/* i52LTPVFrontendBundle:Default:venta.html.twig */
class __TwigTemplate_c415970fc618a9adb51223c9984e233c551a1a82d9049caba00fc5d2fc6a150c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'contenido' => array($this, 'block_contenido'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_contenido($context, array $blocks = array())
    {
        // line 4
        echo "
  ";
        // line 5
        if ((isset($context["socios"]) ? $context["socios"] : null)) {
            // line 6
            echo "
    <h3>Clientes</h3>

    <table class=\"records_list\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Poblacion</th>
                <th>Cp</th>
                <th>Provincia</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Telefono fijo</th>
                <th>Telefono movil</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
        ";
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["socios"]) ? $context["socios"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["socio"]) {
                // line 27
                echo "            <tr>
                <td>";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($context["socio"], "id", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($context["socio"], "nombre", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($context["socio"], "direccion", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($context["socio"], "poblacion", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute($context["socio"], "cp", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($context["socio"], "provincia", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($context["socio"], "dni", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute($context["socio"], "email", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute($context["socio"], "telefijo", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute($context["socio"], "telemovil", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($context["socio"], "saldo", array()), "html", null, true);
                echo "</td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['socio'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "        </tbody>
    </table>

  ";
        }
        // line 45
        echo "

  ";
        // line 47
        if ((isset($context["productos"]) ? $context["productos"] : null)) {
            // line 48
            echo "
    <h3>Productos</h3>

    <table class=\"records_list\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>IVA</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
        ";
            // line 62
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["productos"]) ? $context["productos"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["producto"]) {
                // line 63
                echo "            <tr>
                <td>";
                // line 64
                echo twig_escape_filter($this->env, $this->getAttribute($context["producto"], "id", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute($context["producto"], "nombre", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute($context["producto"], "precio", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($context["producto"], "iva", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute($context["producto"], "stock", array()), "html", null, true);
                echo "</td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['producto'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            echo "        </tbody>
    </table>

  ";
        }
        // line 75
        echo "
";
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Default:venta.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 75,  182 => 71,  173 => 68,  169 => 67,  165 => 66,  161 => 65,  157 => 64,  154 => 63,  150 => 62,  134 => 48,  132 => 47,  128 => 45,  122 => 41,  113 => 38,  109 => 37,  105 => 36,  101 => 35,  97 => 34,  93 => 33,  89 => 32,  85 => 31,  81 => 30,  77 => 29,  73 => 28,  70 => 27,  66 => 26,  44 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
