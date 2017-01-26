<?php

namespace Wwus\ExerciceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wwus\ExerciceBundle\Entity\Advert;
use Wwus\ExerciceBundle\Form\AdvertType;
use Symfony\Component\HttpFoundation\Request;


class AdvertController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$adverts = $em->getRepository('WwusExerciceBundle:Advert')->findAll();
        return $this->render('WwusExerciceBundle:Advert:indexAdvert.html.twig', array('adverts' => $adverts ));
    }

    public function newAction(Request $Request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$advert = new Advert();
    	$form = $this->get('form.factory')->create(AdvertType::class, $advert);
    	if ($Request->isMethod('POST')) {
    		$form->handleRequest($Request);
    		if ($form->isValid()) {
    			$em->persist($advert);
    			$em->flush();
    			return $this->redirectToRoute('wwus_advert_index');
    		}
    	}
    	return $this->render('WwusExerciceBundle:Advert:newAdvert.html.twig', array('form' => $form->createView()));
    }

    public function modifAction(Request $Request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$advert = $em->getRepository('WwusExerciceBundle:Advert')->find($id);
    	$form = $this->get('form.factory')->create(AdvertType::class, $advert);
    	
    	if ($Request->isMethod('POST')) {
    		$form->handleRequest($Request);
    		if ($form->isValid()) {
    			$em->flush();
    			return $this->redirectToRoute('wwus_advert_index');
    		}
    	}
    	return $this->render('WwusExerciceBundle:Advert:modifAdvert.html.twig', array('form' => $form->createView()));
    }

    public function suppAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$advert = $em->getRepository('WwusExerciceBundle:Advert')->find($id);
    	$em->remove($advert);
    	$em->flush();
    	return $this->redirectToRoute('wwus_advert_index');
    }

}