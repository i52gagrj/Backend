<?php

/* i52LTPVFrontendBundle:Seguridad:login.html.twig */
class __TwigTemplate_90787107753ffe006f7d44c77832eb19b6bf62a6fb390af745da1a90737695be extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "i52LTPVFrontendBundle:Seguridad:login.html.twig", 1);
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

    // line 2
    public function block_contenido($context, array $blocks = array())
    {
        // line 3
        echo "  <div class=\"contenido\"> 
";
        // line 4
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 5
            echo "    <div>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "messageData", array())), "html", null, true);
            echo "</div>
";
        }
        // line 7
        echo "
<form action=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">
  <div>
    <label for=\"username\">Usuario:</label>
    <input size=\"8\" type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\"/>
  </div>
  <div>
    <label for=\"password\">Clave: &nbsp &nbsp</label>
    <input size=\"8\" type=\"password\" id=\"password\" name=\"_password\"/>
  </div>

    ";
        // line 23
        echo "    <input type=\"submit\" class=\"symfony-button-grey\" value=\"Login\" />
    ";
        // line 25
        echo "  </form>
  </div> 
";
    }

    public function getTemplateName()
    {
        return "i52LTPVFrontendBundle:Seguridad:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 25,  61 => 23,  51 => 11,  45 => 8,  42 => 7,  36 => 5,  34 => 4,  31 => 3,  28 => 2,  11 => 1,);
    }
}
