<?php

namespace App\Form;

use App\Entity\Adresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomVille', TextType::class,[

                'label' => 'Nom',
                'constraints' => [

                    new Assert\NotBlank([
                        'message' => 'Veuillez renseigner le nom de la ville'
                    ]),
                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre nom de ville doit contenir au minimum {{3}} charactères',
                        'max' => 100,
                        'maxMessage' => 'votre nom de ville ne peux contenir que {{100}} charactères au maximum'
                    ]),
                ],
            ])
            ->add('cp', TextType::class,[

                'label' => 'Code postal',
                'constraints' => [

                    new Assert\NotBlank([
                        'message' => 'Veuillez renseigner le code postal de la ville'
                    ]),
                    new Assert\Length([
                        'min' => 5,
                        'minMessage' => 'Votre code postal doit contenir au minimum {{5}} chiffres',
                        'max' => 5,
                        'maxMessage' => 'votre code postal ne peux contenir que {{5}} chiffres au maximum'
                    ]),
                ],
            ])
            ->add('nomDepartement', TextType::class,[

                'label' => 'Département',
                'constraints' => [

                    new Assert\NotBlank([
                        'message' => 'Veuillez renseigner le nom du département'
                    ]),
                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre nom de département doit contenir au minimum {{3}} charactères',
                        'max' => 50,
                        'maxMessage' => 'votre nom de département ne peux contenir que {{50}} charactères au maximum'
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
        ]);
    }
}
