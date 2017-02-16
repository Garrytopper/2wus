<?php

namespace Wwus\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wwus\ArticleBundle\Entity\Article;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

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
        

        $formArticle1 = $this->get('form.factory')->createBuilder(FormType::class, $article)
                                                ->add('Titre', TextType::class)
                                                ->getForm()
                                                ;

        if ($request->isMethod('POST')) {
            $form1->handleRequest($request);
            if ($form1->isValid()) {
                $em->persist($article);
                $em->flush();
                return $this->redirectToRoute('wwus_article_homepage');
            }
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
