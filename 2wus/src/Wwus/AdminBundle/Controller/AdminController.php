<?php

namespace Wwus\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('WwusAdminBundle::layout.html.twig');
    }
}
