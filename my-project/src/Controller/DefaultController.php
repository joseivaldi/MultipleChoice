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

    public function Mezclar_Preguntas(){

        $Preguntas = $this->Parsear_Archivo("/preguntas.yml");
        $Preguntas = $Preguntas["preguntas"];
        shuffle($Preguntas);

        $Respuestas_mezcladas = []


        //Este for me toma una pregunta de la lista de preguntas
        foreach ($Preguntas  as $pregunta){     
            $mezcla_preguntas = array_merge($pregunta["respuestas_correctas"], $pregunta["respuestas_incorrectas"]);
            shuffle($mezcla_preguntas);
            $Respuestas_mezcladas [] = $mezcla_preguntas;
        }

        //Escribo las preguntas en un archivo yml para cuando genero las rtas
        $Preguntas_de_Ultimo_Examen = Yaml :: dump ($Preguntas);

        file_put_contents(__DIR__.'/preguntas_ultimo_examen.yml' ,$Preguntas_de_Ultimo_Examen);

        //Lo mismo para las rtas
        $Rtas_de_Ultimo_Examen = Yaml :: dump($Respuestas_mezcladas);

        file_put_contents(__DIR__.'/rtas_ultimo_examen.yml', $Rtas_de_Ultimo_Examen);

        return [$Preguntas, $Respuestas_mezcladas];
        
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
