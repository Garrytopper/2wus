<?php

namespace Wwus\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wwus\ArticleBundle\Entity\Tags;
use Wwus\ArticleBundle\Form\TagsType;
use Symfony\Component\HttpFoundation\Request; 

class TagsController extends Controller
{
    public function indexAction(Request $Request)
    {
        $tags = $this->getDoctrine()->getManager()->getRepository('WwusArticleBundle:Tags')->findAll();
        return $this->render('WwusArticleBundle:Tags:index.html.twig', array('tags' => $tags));
    }

    public function newAction(Request $Request)
    {
        $tag = new Tags();
        $form = $this->get('form.factory')->create(TagsType::class, $tag);
        if ($Request->isMethod('POST')) {
            $form->handleRequest($Request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($tag);
                $em->flush();
                return $this->redirectToRoute('wwus_tags_index');
            }
        }
        return $this->render('WwusArticleBundle:Tags:new.html.twig', array('form' => $form->createView()));
    }

    public function modifAction(Request $Request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $tagModif = $em->getRepository('WwusArticleBundle:Tags')->find($id);
        $form = $this->get('form.factory')->create(TagsType::class, $tagModif);
        if ($Request->isMethod('POST')) {
            $form->handleRequest($Request);
            if ($form->isValid()) {
                $em->flush();
                return $this->redirectToRoute('wwus_tags_index');
            }
        }
        return $this->render('WwusArticleBundle:Tags:modif.html.twig', array('form' => $form->createView()));
    }

    public function suppAction($tag)
    {
        return $this->render('WwusArticleBundle:Tags:supp.html.twig', array('tag' => $tag));
    }

}
