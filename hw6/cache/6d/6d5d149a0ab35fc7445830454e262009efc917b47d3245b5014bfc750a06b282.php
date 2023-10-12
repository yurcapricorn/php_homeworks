<?php

/* one.html */
class __TwigTemplate_d249645d2d714bfe092d7fb6044d876a2a3ca5802eb9dbb44e1c3596e9132359 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Article</title>
</head>
<body>

<div>
    <h1>
        ";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["article"] ?? null), "title", array()), "html", null, true);
        echo "
    </h1>

    <h2>
        ";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["article"] ?? null), "author", array()), "name", array()), "html", null, true);
        echo "
        ";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["article"] ?? null), "author", array()), "surname", array()), "html", null, true);
        echo "
    </h2>

    <p>
        ";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["article"] ?? null), "lead", array()), "html", null, true);
        echo "
    </p>


    <a href=\"/News/Default\"> <button>ALL NEWS</button> </a>
</div>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "one.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 20,  42 => 16,  38 => 15,  31 => 11,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "one.html", "C:\\OpenServer\\domains\\php_homeworks\\hw6\\templates\\news\\one.html");
    }
}
