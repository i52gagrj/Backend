<?php

/* i52LTPVBackendBundle:Producto:show.html.twig */
class __TwigTemplate_9f1b741b1b90a428555e052877ec1b44ab9559dc9ddeeccb3695d13f741e533a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVBackendBundle:Producto:show.html.twig", 1);
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
    <h3>Producto</h3>

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
                <th align = \"right\">Descripcion</th>
                <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "descripcion", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">Precio</th>
                <td>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "precio", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">IVA</th>
                <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "iva", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">Stock</th>
                <td>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "stock", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th align = \"left\">Activo</th>
                <td>";
        // line 35
        if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "activo", array())) {
            echo "Si";
        } else {
            echo "No";
        }
        echo "</td>
            </tr>
            ";
        // line 37
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "activo", array()) == false)) {
            // line 38
            echo "            <tr>
                <th align = \"left\">Fecha de baja</th>
                <td>";
            // line 40
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "fechainactivo", array()), "Y-m-d"), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        // line 43
        echo "        </tbody>
    </table>

        <ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 48
        echo $this->env->getExtension('routing')->getPath("producto");
        echo "\">
            Volver al listado
        </a>
    </li>
    <li>
        <a href=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("producto_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id", array()))), "html", null, true);
        echo "\">
            Editar
        </a>
    </li>
    <li>";
        // line 57
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : null), 'form');
        echo "</li>
</ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "i52LTPVBackendBundle:Producto:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 57,  118 => 53,  110 => 48,  103 => 43,  97 => 40,  93 => 38,  91 => 37,  82 => 35,  75 => 31,  68 => 27,  61 => 23,  54 => 19,  47 => 15,  40 => 11,  31 => 4,  28 => 3,  11 => 1,);
    }
}
