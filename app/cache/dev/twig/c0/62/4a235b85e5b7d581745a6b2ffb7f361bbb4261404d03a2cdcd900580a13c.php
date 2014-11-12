<?php

/* BSUserBundle:Default:index.html.twig */
class __TwigTemplate_c0624a235b85e5b7d581745a6b2ffb7f361bbb4261404d03a2cdcd900580a13c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BSUserBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Index";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    <div>
        <a class=\"btn btn-primary btn-lg\"  href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
        echo "\">Login</a>
        <a class=\"btn btn-primary btn-lg\"  href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("upload");
        echo "\">Upload</a>
        <a class=\"btn btn-primary btn-lg\"  href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\">Logout</a>
    </div>
";
    }

    public function getTemplateName()
    {
        return "BSUserBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 9,  46 => 8,  42 => 7,  39 => 6,  36 => 5,  29 => 3,);
    }
}
