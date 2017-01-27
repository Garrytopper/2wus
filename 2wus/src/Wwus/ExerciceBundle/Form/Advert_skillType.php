<?php

namespace Wwus\ExerciceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class Advert_skillType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('advert', EntityType::class, array('class' => 'WwusExerciceBundle:Advert', 'choice_label' => 'intitule'))
                ->add('skill', EntityType::class, array('class' => 'WwusExerciceBundle:Skill', 'choice_label' => 'competence'))
                ->add('level', ChoiceType::class, array(
                    'choices' => array(
                        'Débutant' => 1,
                        'Confirme' => 2,
                        'Expert' => 3 
                        ))) 
                ->add('Ajouter', SubmitType::class)  
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wwus\ExerciceBundle\Entity\Advert_skill'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wwus_exercicebundle_advert_skill';
    }


}
