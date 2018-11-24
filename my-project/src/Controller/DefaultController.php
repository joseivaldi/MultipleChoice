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
    public function index()
    {
        $Archivo_parseado = Yaml::parseFile(__DIR__.'/preguntas.yml');
        $Preguntas = $Archivo_parseado["preguntas"];

        //dump($Preguntas);

        return $this->render('default/index.html.twig', ["preguntas" => $Preguntas]);
    }
}
