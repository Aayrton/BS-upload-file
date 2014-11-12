<?php

/* ::base.html.twig */
class __TwigTemplate_b1dab57315c0e3a0901f5e9f9f251e44cee2ea2116475002465880dca9904f8d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    ";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "</head>

<body>
<header id=\"header-bs-exo\">
    <div class=\"container\">

    </div>
</header>

<div class=\"container\">
";
        // line 23
        $this->displayBlock('body', $context, $blocks);
        // line 26
        echo "</div>


";
        // line 29
        $this->displayBlock('javascripts', $context, $blocks);
        // line 34
        echo "
</body>
</html>";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "OC Plateforme";
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "        <link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css\">
        <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/bsuser/css/bs.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    ";
    }

    // line 23
    public function block_body($context, array $blocks = array())
    {
        // line 24
        echo "
";
    }

    // line 29
    public function block_javascripts($context, array $blocks = array())
    {
        // line 30
        echo "    ";
        // line 31
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>
    <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  96 => 31,  94 => 30,  91 => 29,  86 => 24,  83 => 23,  77 => 11,  74 => 10,  71 => 9,  65 => 7,  59 => 34,  57 => 29,  52 => 26,  50 => 23,  38 => 13,  36 => 9,  31 => 7,  23 => 1,);
    }
}
