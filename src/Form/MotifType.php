<?php

namespace App\Form;

use App\Entity\Motif;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MotifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('motifType', TextType::class,[

                'label' => 'Motif',
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre motif doit contenir au minimum {{3}} charactères',
                        'max' => 150,
                        'maxMessage' => 'votre motif ne peux contenir que {{150}} charactères au maximum'
                    ]),
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Motif::class,
        ]);
    }
}
