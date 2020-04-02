<?php

namespace App\Form;

use App\Entity\TypeIntervention;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class TypeInterventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('interventionType', TextType::class,[
                'required' => false,
                'label' => "Type d'intervention",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre nom doit contenir au minimum {{3}} charactères',
                        'max' => 150,
                        'maxMessage' => 'votre rue ne peux contenir que {{150}} charactères au maximum'
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TypeIntervention::class,
        ]);
    }
}
