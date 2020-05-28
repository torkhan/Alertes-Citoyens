<?php

namespace App\Form;

use App\Entity\TypeMessage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class TypeMessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('messageType', TextType::class,[
                'required' => true,
                'label' => "Type de message",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre titre doit contenir au minimum {{3}} charactères',
                        'max' => 150,
                        'maxMessage' => 'votre titre ne peux contenir que {{150}} charactères au maximum'
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TypeMessage::class,
        ]);
    }
}
