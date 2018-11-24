<?php

/* default/index.html.twig */
class __TwigTemplate_30780dde6e0161c190663413c783c42453aa242444b078e253415aafa70947e8 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "default/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "default/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "default/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "<!-- <style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
</style> -->

<style>

.Caja-de-preguntas {
    width: 50%;
      border: 1px solid black;
      padding-top: 15px;
    padding-right: 0px;
    padding-bottom: 20px;
    padding-left:     10px;
    font-weight: bold;
}

.Caja-de-rtas {
    font-weight: normal;
}

</style>

";
        // line 28
        $context["numero_pregunta"] = 1;
        // line 29
        echo "
";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["preguntas"]) || array_key_exists("preguntas", $context) ? $context["preguntas"] : (function () { throw new Twig_Error_Runtime('Variable "preguntas" does not exist.', 30, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["pregunta"]) {
            // line 31
            echo "
    <div class=\"Caja-de-preguntas\">

        ";
            // line 34
            echo twig_escape_filter($this->env, (isset($context["numero_pregunta"]) || array_key_exists("numero_pregunta", $context) ? $context["numero_pregunta"] : (function () { throw new Twig_Error_Runtime('Variable "numero_pregunta" does not exist.', 34, $this->source); })()), "html", null, true);
            echo ") ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pregunta"], "descripcion", array()), "html", null, true);
            echo "

        <br>
        <br>
        <div class=\"Caja-de-rtas\">

            ";
            // line 40
            $context["respuestas"] = twig_get_attribute($this->env, $this->source, (isset($context["Respuestas_mezcladas"]) || array_key_exists("Respuestas_mezcladas", $context) ? $context["Respuestas_mezcladas"] : (function () { throw new Twig_Error_Runtime('Variable "Respuestas_mezcladas" does not exist.', 40, $this->source); })()), ((isset($context["numero_pregunta"]) || array_key_exists("numero_pregunta", $context) ? $context["numero_pregunta"] : (function () { throw new Twig_Error_Runtime('Variable "numero_pregunta" does not exist.', 40, $this->source); })()) - 1), array(), "array");
            // line 41
            echo "
                ";
            // line 42
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["respuestas"]) || array_key_exists("respuestas", $context) ? $context["respuestas"] : (function () { throw new Twig_Error_Runtime('Variable "respuestas" does not exist.', 42, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["respuesta"]) {
                // line 43
                echo "
                    (__) ";
                // line 44
                echo twig_escape_filter($this->env, $context["respuesta"], "html", null, true);
                echo "

                    <br>
                    <br>

                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['respuesta'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "
        </div>

    </div>

    <br>

    ";
            // line 57
            $context["numero_pregunta"] = ((isset($context["numero_pregunta"]) || array_key_exists("numero_pregunta", $context) ? $context["numero_pregunta"] : (function () { throw new Twig_Error_Runtime('Variable "numero_pregunta" does not exist.', 57, $this->source); })()) + 1);
            // line 58
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pregunta'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "default/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 60,  138 => 58,  136 => 57,  127 => 50,  115 => 44,  112 => 43,  108 => 42,  105 => 41,  103 => 40,  92 => 34,  87 => 31,  83 => 30,  80 => 29,  78 => 28,  53 => 5,  44 => 4,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}


{% block body %}
<!-- <style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
</style> -->

<style>

.Caja-de-preguntas {
    width: 50%;
      border: 1px solid black;
      padding-top: 15px;
    padding-right: 0px;
    padding-bottom: 20px;
    padding-left:     10px;
    font-weight: bold;
}

.Caja-de-rtas {
    font-weight: normal;
}

</style>

{% set numero_pregunta = 1 %}

{% for pregunta in preguntas %}

    <div class=\"Caja-de-preguntas\">

        {{ numero_pregunta }}) {{ pregunta.descripcion }}

        <br>
        <br>
        <div class=\"Caja-de-rtas\">

            {% set respuestas = Respuestas_mezcladas[numero_pregunta-1] %}

                {% for respuesta in respuestas %}

                    (__) {{respuesta}}

                    <br>
                    <br>

                {% endfor %}

        </div>

    </div>

    <br>

    {% set numero_pregunta = numero_pregunta+1 %}

{% endfor %}

{% endblock %}", "default/index.html.twig", "C:\\Users\\jose-\\OneDrive\\Desktop\\MC2\\MultipleChoice\\my-project\\templates\\default\\index.html.twig");
    }
}
