<?php

namespace App\Form;

use App\Entity\Intervention;
use App\Entity\Service;
use App\Entity\User;
use App\Repository\InterventionRepository;
use App\Repository\ServiceRepository;
use Doctrine\DBAL\Types\ArrayType;
use Doctrine\DBAL\Types\JsonType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,[
                'required' => true,
                'label' => "Email",
            ])

            ->add('password', PasswordType::class,[
                'required' => true,
                'label' => "Mot de passe",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre rue doit contenir au minimum {{3}} charactères',
                        'max' => 50,
                        'maxMessage' => 'votre rue ne peux contenir que {{50}} charactères au maximum'
                    ]),
                ],
            ])
            /*->add('statut')*/
            ->add('username', TextType::class,[
                'required' => true,
                'label' => "Login",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre rue doit contenir au minimum {{3}} charactères',
                        'max' => 50,
                        'maxMessage' => 'votre rue ne peux contenir que {{50}} charactères au maximum'
                    ]),
                ],
            ])


            ->add('nomUtilisateur', TextType::class,[
                'required' => true,
                'label' => "Nom",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre rue doit contenir au minimum {{3}} charactères',
                        'max' => 50,
                        'maxMessage' => 'votre rue ne peux contenir que {{50}} charactères au maximum'
                    ]),
                ],
            ])
            ->add('prenomUtilisateur', TextType::class,[
                'required' => true,
                'label' => "Prénom",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre rue doit contenir au minimum {{3}} charactères',
                        'max' => 50,
                        'maxMessage' => 'votre rue ne peux contenir que {{50}} charactères au maximum'
                    ]),
                ],
            ])

            ->add('commentaireUtilisateur', TextareaType::class,[
                'required' => false,
                'label' => "Commentaire",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre rue doit contenir au minimum {{3}} charactères',
                        'max' => 50,
                        'maxMessage' => 'votre rue ne peux contenir que {{50}} charactères au maximum'
                    ]),
                ],
            ])
          ->add('idService',EntityType::class,[
                'class' => Service::class,
                'label' => 'Service',
                'query_builder' => function (ServiceRepository $er) {
                    return $er->createQueryBuilder('v')
                        ->orderBy('v.nomService', 'ASC');
                },
                'choice_label' => 'nomService',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
