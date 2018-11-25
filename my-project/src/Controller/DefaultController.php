<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function Parsear_Archivo ($Archivo){

        $Archivo_parseado = Yaml :: parseFile(__DIR__.$Archivo);

        return $Archivo_parseado;

    }


    public function index()
    {
        $Preguntas = $Archivo_parseado["preguntas"];        #tiene un elemento que tiene las 25 preguntas
        shuffle($Preguntas);                                #Mezclamos las pregs

        $Respuestas_mezcladas= [];                      #Mezclar las rtas

        foreach($Preguntas as $pregunta){
            $mezcla_preguntas = array_merge($pregunta["respuestas_correctas"], $pregunta["respuestas_incorrectas"]);
            shuffle($mezcla_preguntas); 
            $Respuestas_mezcladas[]=$mezcla_preguntas;

        }
        //dump($Preguntas);

        return $this->render('default/index.html.twig', ["preguntas" => $Preguntas, "Respuestas_mezcladas" => $Respuestas_mezcladas]);
    }
}
