<?php

namespace Wwus\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function accueilAction()
    {
        return $this->render('WwusBlogBundle::layout.html.twig');
    }
}
