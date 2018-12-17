<?php

/* Contact/list.html.twig */
class __TwigTemplate_7df2b035631fcf78fec9103534e7cc885c9fe90dd448f1822f9a9c623bb6702a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base/base.html.twig", "Contact/list.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <main role=\"main\" class=\"container\">
        <h1 class=\"mt-5\">La liste des contacts</h1>
        ";
        // line 6
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "contacts", array()))) {
            // line 7
            echo "            <table class=\"table table-hover\">
                <thead>
                <tr>
                    <th scope=\"col\">#</th>
                    <th scope=\"col\">FirstName</th>
                    <th scope=\"col\">LastName</th>
                    <th scope=\"col\">email</th>
                    <th scope=\"col\">#</th>
                </tr>
                </thead>
                <tbody>
                ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "contacts", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
                // line 19
                echo "                    <tr>
                        <th scope=\"row\">";
                // line 20
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", array()), "html", null, true);
                echo "</th>
                        <td>";
                // line 21
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "firstName", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 22
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "lastName", array()), "html", null, true);
                echo "</td>
                        <td>";
                // line 23
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "email", array()), "html", null, true);
                echo "</td>
                        <td><a href=\"http://";
                // line 24
                echo twig_escape_filter($this->env, ($context["host"] ?? null), "html", null, true);
                echo "/LEBONCOIN/public/contact/edit.php?id=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contact"], "id", array()), "html", null, true);
                echo "\">Edit</a></td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "                </tbody>
            </table>
        ";
        } else {
            // line 30
            echo "            <div class=\"alert alert-info\">No contacts found</div>
        ";
        }
        // line 32
        echo "    </main>
";
    }

    // line 35
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 36
        echo "
";
    }

    public function getTemplateName()
    {
        return "Contact/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 36,  103 => 35,  98 => 32,  94 => 30,  89 => 27,  78 => 24,  74 => 23,  70 => 22,  66 => 21,  62 => 20,  59 => 19,  55 => 18,  42 => 7,  40 => 6,  36 => 4,  33 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Contact/list.html.twig", "C:\\wamp64\\www\\LEBONCOIN\\resources\\templates\\contact\\list.html.twig");
    }
}
