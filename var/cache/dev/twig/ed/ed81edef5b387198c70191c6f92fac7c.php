<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* base.html.twig */
class __TwigTemplate_75265518f4b7334ffe6b6f2856d8613d extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("style.css"), "html", null, true);
        yield "\" >

</head>
<body>
    <div class=\"wrapper\">
        <!-- Navbar -->
        <nav class=\"navbar\">

            <ul class=\"navbar-list\">
                       ";
        // line 16
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 17
            yield "
                <li><a href=\"";
            // line 18
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("acceuil");
            yield "\">Accueil</a></li>
                <li><a href=\"";
            // line 19
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("articles");
            yield "\">Articles</a></li>
                <li><a href=\"\">Contact</a></li>
                             ";
        } else {
            // line 22
            yield "                             <li><a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
            yield "\">Login</a></li>
                <li><a href=\"";
            // line 23
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("register");
            yield "\">Register</a></li>
                                 ";
        }
        // line 25
        yield "

            </ul>
                                   ";
        // line 28
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 29
            yield "
            <div class=\"navbar-profile\">
                <img src=\"";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 31, $this->source); })()), "user", [], "any", false, false, false, 31), "photo", [], "any", false, false, false, 31), "html", null, true);
            yield "\" alt=\"Photo de profil\" class=\"profile-img\">
                <span class=\"profile-name\">";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 32, $this->source); })()), "user", [], "any", false, false, false, 32), "username", [], "any", false, false, false, 32), "html", null, true);
            yield "</span>
               

                <a href=\"";
            // line 35
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("logout");
            yield "\">  <button class=\"btn-logout\" >Se déconnecter</button></a>
            </div>
                                 ";
        }
        // line 38
        yield "
                        
        </nav>

        <!-- Contenu principal -->
        <main class=\"content\">
            ";
        // line 44
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 47
        yield "        </main>
    </div>

    <!-- Footer -->
    <footer class=\"footer\">
        <p>&copy; 2024 Mon Blog</p>
        <ul class=\"footer-links\">
            <li><a href=\"#\">Mentions légales</a></li>
            <li><a href=\"#\">Politique de confidentialité</a></li>
            <li><a href=\"#\">Contact</a></li>
        </ul>
    </footer>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Mon Blog";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 44
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 45
        yield "           
            ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  196 => 45,  183 => 44,  160 => 6,  135 => 47,  133 => 44,  125 => 38,  119 => 35,  113 => 32,  109 => 31,  105 => 29,  103 => 28,  98 => 25,  93 => 23,  88 => 22,  82 => 19,  78 => 18,  75 => 17,  73 => 16,  61 => 7,  57 => 6,  50 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}Mon Blog{% endblock %}</title>
    <link rel=\"stylesheet\" href=\"{{ asset('style.css') }}\" >

</head>
<body>
    <div class=\"wrapper\">
        <!-- Navbar -->
        <nav class=\"navbar\">

            <ul class=\"navbar-list\">
                       {% if is_granted('IS_AUTHENTICATED_FULLY') %}

                <li><a href=\"{{ path('acceuil') }}\">Accueil</a></li>
                <li><a href=\"{{path('articles')}}\">Articles</a></li>
                <li><a href=\"\">Contact</a></li>
                             {% else %}
                             <li><a href=\"{{ path('login') }}\">Login</a></li>
                <li><a href=\"{{ path('register') }}\">Register</a></li>
                                 {% endif %}


            </ul>
                                   {% if is_granted('IS_AUTHENTICATED_FULLY') %}

            <div class=\"navbar-profile\">
                <img src=\"{{app.user.photo}}\" alt=\"Photo de profil\" class=\"profile-img\">
                <span class=\"profile-name\">{{app.user.username}}</span>
               

                <a href=\"{{ path('logout') }}\">  <button class=\"btn-logout\" >Se déconnecter</button></a>
            </div>
                                 {% endif %}

                        
        </nav>

        <!-- Contenu principal -->
        <main class=\"content\">
            {% block content %}
           
            {% endblock %}
        </main>
    </div>

    <!-- Footer -->
    <footer class=\"footer\">
        <p>&copy; 2024 Mon Blog</p>
        <ul class=\"footer-links\">
            <li><a href=\"#\">Mentions légales</a></li>
            <li><a href=\"#\">Politique de confidentialité</a></li>
            <li><a href=\"#\">Contact</a></li>
        </ul>
    </footer>
</body>
</html>
", "base.html.twig", "C:\\Users\\gazza\\gazz\\Bureau\\Cours EEMI\\Sem 1\\Symfony\\myblogapp\\templates\\base.html.twig");
    }
}
