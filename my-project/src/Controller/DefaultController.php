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

    public function Parsear_Archivo($Archivo){

		$Archivo_parseado = Yaml::parseFile(__DIR__.$Archivo);

    	return $Archivo_parseado;

    }

    public function Mezaclar_Preguntas(){

    	$Preguntas = $this->Parsear_Archivo("/preguntas.yml");
    	$Preguntas = $Preguntas["preguntas"];
    	shuffle($Preguntas);

    	$Respuestas_mezcladas = [];
    	
    	foreach ($Preguntas as $pregunta) {
    		$mezcla_preguntas = array_merge($pregunta["respuestas_correctas"],$pregunta["respuestas_incorrectas"]);
    		shuffle($mezcla_preguntas);
    		$Respuestas_mezcladas[]=$mezcla_preguntas;
    	}

    	$Preguntas_de_Ultimo_Examen = Yaml::dump($Preguntas);

		file_put_contents(__DIR__.'/preguntas_ultimo_examen.yml', $Preguntas_de_Ultimo_Examen);

		$Rtas_de_Ultimo_Examen = Yaml::dump($Respuestas_mezcladas);

		file_put_contents(__DIR__.'/rtas_ultimo_examen.yml', $Rtas_de_Ultimo_Examen);

    	return [$Preguntas, $Respuestas_mezcladas];

    }

    public function MostrarRtas(){
    	
    	if(file_exists( __DIR__.'/preguntas_ultimo_examen.yml') ){
    		
    		$Preguntas = $this->Parsear_Archivo("/preguntas_ultimo_examen.yml");
    		$Respuestas = $this->Parsear_Archivo("/rtas_ultimo_examen.yml");

    		return $this->render('default/MostrarRtas.html.twig', ["preguntas" => $Preguntas, "Respuestas_mezcladas" => $Respuestas]);
    	}
    	else{
    		return $this->render('default/No_existe_examen.html.twig');
    	}
    	
    }

    public function index()
    {
    	$PreguntasyRtas_Mezcladas = $this->Mezaclar_Preguntas();
    	$Preguntas = $PreguntasyRtas_Mezcladas[0];
    	$Respuestas_mezcladas = $PreguntasyRtas_Mezcladas[1];
    	//dump($Preguntas);

        return $this->render('default/index.html.twig', ["preguntas" => $Preguntas, "Respuestas_mezcladas" => $Respuestas_mezcladas]);
    }
}
