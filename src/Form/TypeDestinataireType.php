<?php

namespace App\Form;

use App\Entity\TypeDestinataire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeDestinataireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('destinataireType', TextType::class,[
                'required' => false,
                'label' => "Type de destinataire",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre Type de destinataire doit contenir au minimum {{3}} charactères',
                        'max' => 150,
                        'maxMessage' => 'votre Type de destinataire ne peux contenir que {{150}} charactères au maximum'
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TypeDestinataire::class,
        ]);
    }
}
