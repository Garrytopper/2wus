<?php

namespace Wwus\ExerciceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExerciceController extends Controller
{
    public function indexAction()
    {
        return $this->render('WwusExerciceBundle::layout.html.twig');
    }
}
