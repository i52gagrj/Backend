<?php

/* i52LTPVBackendBundle:Usuario:show.html.twig */
class __TwigTemplate_87ef1cf9c4cc9578e4b3624bdf4d82e45c975138da85074ba4aa041d58c4ddbe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVBackendBundle:Usuario:show.html.twig", 1);
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
    <h3>Usuario</h3>

    <table class=\"record_properties\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "nombre", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>DNI</th>
                <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "dni", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Nombre de Usuario</th>
                <td>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "username", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Activo</th>
                <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "isActive", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Fecha de baja</th>
                <td>";
        // line 31
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "fechainactivo", array()), "Y-m-d H:i:s"), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>

        <ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("usuario");
        echo "\">
            Volver al listado
        </a>
    </li>
    <li>
        <a href=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("usuario_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id", array()))), "html", null, true);
        echo "\">
            Editar
        </a>
    </li>
    <li>";
        // line 47
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : null), 'form');
        echo "</li>
</ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "i52LTPVBackendBundle:Usuario:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 47,  93 => 43,  85 => 38,  75 => 31,  68 => 27,  61 => 23,  54 => 19,  47 => 15,  40 => 11,  31 => 4,  28 => 3,  11 => 1,);
    }
}
