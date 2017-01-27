<?php

namespace Wwus\ExerciceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wwus\ExerciceBundle\Entity\Advert_skill;
use Wwus\ExerciceBundle\Form\Advert_skillType;
use Symfony\Component\HttpFoundation\Request;


class Advert_skillController extends Controller
{
    public function newAction(Request $Request)
    {
        $advertSkill = new Advert_skill();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(Advert_skillType::class, $advertSkill);
        if ($Request->isMethod('POST')) {
            $form->handleRequest($Request);
            if ($form->isValid()) {
                $em->persist($advertSkill);
                $em->flush();
                return $this->redirectToRoute('wwus_advertSkill_new');
            }
        }
        return $this->render('WwusExerciceBundle:Advert_skill:newAdvert_skill.html.twig', array('form' => $form->createView()));
    }

}