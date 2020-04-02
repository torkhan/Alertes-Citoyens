<?php

namespace App\Form;

use App\Entity\Validation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ValidationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('etatValidation',TextType::class,[
                'label' => 'Validation',
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'max' => 50,
                    ]),
                ],

            ])
            ->add('etatValidation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Validation::class,
        ]);
    }
}
