<?php

namespace Wwus\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wwus\ArticleBundle\Entity\Article;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    public function indexAction()
    {
        return $this->render('WwusArticleBundle:articles:Accueil.html.twig');
    }

    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $article = new Article();
        $tagsRepository = $em->getRepository('WwusArticleBundle:Tags')->findAll();
        if ($request->isMethod('POST')) {
            $titre = $request->request->get('titre');
            $response = new Response();
            $response->setContent($titre);
            return $response;
            }
        return $this->render('WwusArticleBundle:articles:new1.html.twig', array('tags' => $tagsRepository));
    }

    public function brouillonsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $brouillons = $em->getRepository('WwusArticleBundle:Article')->findBy(
                                                                        array('publication' => false),
                                                                        array('dateCreation' => 'desc')
                                                                        );
        return $this->render('WwusArticleBundle:articles:brouillons.html.twig', array('brouillons' => $brouillons));
    }
}
