<?php

/* i52LTPVBackendBundle:Socio:show.html.twig */
class __TwigTemplate_ee03a8ac8bbc4683ae1c4480d06dff13031a48b34e84fdfd28f70e63548e6eba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVBackendBundle:Socio:show.html.twig", 1);
        $this->blocks = array(
            'contenido' => array($this, 'block_contenido'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_contenido($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"contenido\"> 
    <h1>Socio</h1>

    <table class=\"record_properties\">
        <tbody>
            <tr>
                <th align = \"left\">Id</th>
                <td>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">Nombre</th>
                <td>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "nombre", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">Direccion</th>
                <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "direccion", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">Poblacion</th>
                <td>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "poblacion", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">Código Postal</th>
                <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "cp", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">Provincia</th>
                <td>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "provincia", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">DNI</th>
                <td>";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "dni", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">E-mail</th>
                <td>";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "email", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">Telefono fijo</th>
                <td>";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "telefijo", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">Telefono movil</th>
                <td>";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "telemovil", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">Saldo</th>
                <td>";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "saldo", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">Activo</th>
                <td>";
        // line 55
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "activo", array())) {
            echo " Si ";
        } else {
            echo " No ";
        }
        echo "</td>
            </tr>
            ";
        // line 57
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "activo", array()) == false)) {
            // line 58
            echo "            <tr>
                <th align = \"left\">Fecha de baja</th>
                <td>";
            // line 60
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "fechainactivo", array()), "Y-m-d"), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        // line 62
        echo " 
        </tbody>
    </table>

        <ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 68
        echo $this->env->getExtension('routing')->getPath("socio");
        echo "\">
            Volver al listado
        </a>
    </li>
    <li>
        <a href=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("socio_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id", array()))), "html", null, true);
        echo "\">
            Editar
        </a>
    </li>
    <li>";
        // line 77
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : null), 'form');
        echo "</li>
</ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "i52LTPVBackendBundle:Socio:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 77,  154 => 73,  146 => 68,  138 => 62,  132 => 60,  128 => 58,  126 => 57,  117 => 55,  110 => 51,  103 => 47,  96 => 43,  89 => 39,  82 => 35,  75 => 31,  68 => 27,  61 => 23,  54 => 19,  47 => 15,  40 => 11,  31 => 4,  28 => 3,  11 => 1,);
    }
}
