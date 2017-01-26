<?php

namespace Wwus\ExerciceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wwus\ExerciceBundle\Entity\Application;
use Wwus\ExerciceBundle\Form\ApplicationType;
use Symfony\Component\HttpFoundation\Request;


class ApplicationController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$applications = $em->getRepository('WwusExerciceBundle:Application')->findAll();
        return $this->render('WwusExerciceBundle:Application:indexApplication.html.twig', array('applications' => $applications ));
    }

    public function newAction(Request $Request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$application = new Application();
    	$form = $this->get('form.factory')->create(ApplicationType::class, $application);
    	if ($Request->isMethod('POST')) {
    		$form->handleRequest($Request);
    		if ($form->isValid()) {
    			$em->persist($application);
    			$em->flush();
    			return $this->redirectToRoute('wwus_application_index');
    		}
    	}
    	return $this->render('WwusExerciceBundle:Application:newApplication.html.twig', array('form' => $form->createView()));
    }

    public function modifAction(Request $Request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$Application = $em->getRepository('WwusExerciceBundle:Application')->find($id);
    	$form = $this->get('form.factory')->create(ApplicationType::class, $application);
    	
    	if ($Request->isMethod('POST')) {
    		$form->handleRequest($Request);
    		if ($form->isValid()) {
    			$em->flush();
    			return $this->redirectToRoute('wwus_application_index');
    		}
    	}
    	return $this->render('WwusExerciceBundle:Application:modifAdvert.html.twig', array('form' => $form->createView()));
    }

    public function suppAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$Application = $em->getRepository('WwusExerciceBundle:Application')->find($id);
    	$em->remove($Applicaton);
    	$em->flush();
    	return $this->redirectToRoute('wwus_application_index');
    }

}