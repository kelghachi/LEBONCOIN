<?php

/* base/base.html.twig */
class __TwigTemplate_0827c23b1fc0ee33abd95f39633be6ec478514b95ad757f8aea93301c8a53049 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'stylesheet' => array($this, 'block_stylesheet'),
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
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <title>LeBonCoin</title>
    <link rel=\"icon\" type=\"image/x-icon\" href=\"http://";
        // line 9
        echo twig_escape_filter($this->env, ($context["host"] ?? null), "html", null, true);
        echo "/LEBONCOIN/src/assets/leboncoin-logo.png\"/>
    ";
        // line 10
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 13
        echo "</head>
<body>
<header>
    <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
        <a class=\"navbar-brand\" href=\"#\">LBC</a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\"
                aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav mr-auto\">
                <li class=\"nav-item active\">
                    <a class=\"nav-link\" href=\"http://";
        // line 26
        echo twig_escape_filter($this->env, ($context["host"] ?? null), "html", null, true);
        echo "/LEBONCOIN/public/contact/list.php\">Home <span
                                class=\"sr-only\">(current)</span></a>
                </li>
                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\"
                       aria-haspopup=\"true\" aria-expanded=\"false\">
                        Contacts
                    </a>
                    <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                        <a class=\"dropdown-item\" href=\"http://";
        // line 35
        echo twig_escape_filter($this->env, ($context["host"] ?? null), "html", null, true);
        echo "/LEBONCOIN/public/contact/create.php\">Create</a>
                    </div>
                </li>
            </ul>
            <div class=\"form-inline mt-2 mt-md-0\">
                Welcome ";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "login", array()), "html", null, true);
        echo "
            </div>
        </div>
    </nav>
</header>

";
        // line 46
        $this->displayBlock('body', $context, $blocks);
        // line 49
        echo "
";
        // line 50
        $this->displayBlock('javascripts', $context, $blocks);
        // line 54
        echo "</body>
</html>
";
    }

    // line 10
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 11
        echo "        <link href=\"http://";
        echo twig_escape_filter($this->env, ($context["host"] ?? null), "html", null, true);
        echo "/LEBONCOIN/node_modules/bootstrap/dist/css/bootstrap.css\" rel=\"stylesheet\">
    ";
    }

    // line 46
    public function block_body($context, array $blocks = array())
    {
        // line 47
        echo "
";
    }

    // line 50
    public function block_javascripts($context, array $blocks = array())
    {
        // line 51
        echo "    <script src=\"http://";
        echo twig_escape_filter($this->env, ($context["host"] ?? null), "html", null, true);
        echo "/LEBONCOIN/node_modules/jquery/dist/jquery.min.js\"></script>
    <script src=\"http://";
        // line 52
        echo twig_escape_filter($this->env, ($context["host"] ?? null), "html", null, true);
        echo "/LEBONCOIN/node_modules/bootstrap/dist/js/bootstrap.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "base/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 52,  120 => 51,  117 => 50,  112 => 47,  109 => 46,  102 => 11,  99 => 10,  93 => 54,  91 => 50,  88 => 49,  86 => 46,  77 => 40,  69 => 35,  57 => 26,  42 => 13,  40 => 10,  36 => 9,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base/base.html.twig", "C:\\wamp64\\www\\LEBONCOIN\\resources\\templates\\base\\base.html.twig");
    }
}
