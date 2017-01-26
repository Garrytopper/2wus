<?php

namespace Wwus\ExerciceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wwus\ExerciceBundle\Entity\Skill;
use Wwus\ExerciceBundle\Form\SkillType;
use Symfony\Component\HttpFoundation\Request;


class SkillController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$skills = $em->getRepository('WwusExerciceBundle:Skill')->findAll();
        return $this->render('WwusExerciceBundle:skill:indexSkill.html.twig', array('skills' => $skills ));
    }

    public function newAction(Request $Request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$skill = new Skill();
    	$form = $this->get('form.factory')->create(SkillType::class, $skill);
    	if ($Request->isMethod('POST')) {
    		$form->handleRequest($Request);
    		if ($form->isValid()) {
    			$em->persist($skill);
    			$em->flush();
    			return $this->redirectToRoute('wwus_skill_index');
    		}
    	}
    	return $this->render('WwusExerciceBundle:Skill:newSkill.html.twig', array('form' => $form->createView()));
    }

    public function modifAction(Request $Request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$skill = $em->getRepository('WwusExerciceBundle:Skill')->find($id);
    	$form = $this->get('form.factory')->create(SkillType::class, $skill);
    	
    	if ($Request->isMethod('POST')) {
    		$form->handleRequest($Request);
    		if ($form->isValid()) {
    			$em->flush();
    			return $this->redirectToRoute('wwus_skill_index');
    		}
    	}
    	return $this->render('WwusExerciceBundle:Skill:modifSkill.html.twig', array('form' => $form->createView()));
    }

    public function suppAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$skill = $em->getRepository('WwusExerciceBundle:Skill')->find($id);
    	$em->remove($skill);
    	$em->flush();
    	return $this->redirectToRoute('wwus_skill_index');
    }

}