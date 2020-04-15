<?php

namespace App\Form;

use App\Entity\Adresse;
use App\Entity\Destinataire;
use App\Entity\TypeDestinataire;
use App\Entity\Validation;
use App\Repository\AdresseRepository;
use App\Repository\TypeDestinataireRepository;
use App\Repository\ValidationRepository;
use Doctrine\ORM\Query\Expr\Select;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;


class DestinataireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $validator = new EmailValidator();
        $validator->isValid("example@example.com", new RFCValidation());
        $builder

            ->add('nomDestinataire', TextType::class,[

                'label' => 'Nom',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Veuillez renseigner votre nom'
                    ]),
                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre nom doit contenir au minimum {{3}} charactères',
                        'max' => 50,
                        'maxMessage' => 'votre nom ne peux contenir que {{50}} charactères au maximum'
                    ]),
                ],
            ])
            ->add('prenomDestinataire', TextType::class,[

                'label' => 'Prénom',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => ['Veuillez renseigner votre prénom']
                    ]),
                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre prénom doit contenir au minimum 3 charactères',
                        'max' => 50,
                        'maxMessage' => 'votre prénom ne peux contenir que 50 charactères au maximum'
                    ]),
                ],
            ])
            ->add('adresseMailDestinataire', EmailType::class,[
                'required' => true,
                'label' => 'Email',
                'constraints' => [

                ],
            ])
            ->add('numeroTelephoneDestinataire', TextType::class,[
                'required' => true,
                'label' => 'Téléphone portable',
                'constraints' => [

                ],
            ])

            ->add('numeroRueDestinataire', TextType::class,[

                'label' => 'Numéro dans la rue',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Veuillez renseigner votre numéro '
                    ]),
                    new Assert\Length([
                        'min' => 1,
                        'minMessage' => 'Votre numéro doit contenir au minimum {{1}} charactère',
                        'max' => 20,
                        'maxMessage' => 'votre numéro ne peux contenir que {{20}} charactères au maximum'
                    ]),
                ],
            ])
            ->add('nomRueDestinataire1', TextType::class,[

                'label' => 'Nom de la rue',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Veuillez renseigner votre numéro de téléphone'
                    ]),
                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre rue doit contenir au minimum {{3}} charactères',
                        'max' => 150,
                        'maxMessage' => 'votre rue ne peux contenir que {{150}} charactères au maximum'
                    ]),
                ],
            ])
            ->add('nomRueDestinataire2', TextType::class,[
                'required' => false,
                'label' => "Complément d'adresse",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre rue doit contenir au minimum {{3}} charactères',
                        'max' => 150,
                        'maxMessage' => 'votre rue ne peux contenir que {{150}} charactères au maximum'
                    ]),
                ],
            ])

            ->add('idAdresse',EntityType::class,[
                'class' => Adresse::class,
                'label' => 'Ville',
                'query_builder' => function (AdresseRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.nomVille', 'ASC');
                },
                'choice_label' => 'nomVille',
            ])
            ->add('idTypeDestinataire',EntityType::class,[
                'class' => TypeDestinataire::class,
                'label' => 'Vous-êtes?',
                'query_builder' => function (TypeDestinataireRepository $er) {
                    return $er->createQueryBuilder('v')
                        ->orderBy('v.destinataireType', 'ASC');
                },
                'choice_label' => 'destinataireType',
            ])


            ->add('okMailDestinataire', CheckboxType::class,[
                'required' => true,
                'label' => 'je souhaite recevoir mon alerte par Email'
            ])
            ->add('okSmsDestinataire', CheckboxType::class,[
                'required' => true,
                'label' => 'je souhaite recevoir mon alerte par SMS'
            ])
            /*->add('idValidation',EntityType::class,[
                'class' => Validation::class,
                'label' => '.',


                'query_builder' => function (ValidationRepository $er) {
                    return $er->createQueryBuilder('v')
                    ->getFirstResult();
                },


            ])*/

            ->add('accordRgpdDestinataire', CheckboxType::class,[

                'label' => "J'accepte les conditions d'utilisation",

                'constraints' => [
                    new Assert\NotBlank([
                        'message' => "Veuillez accepter les conditions d'utilisation"
                    ]),
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Destinataire::class,
        ]);
    }
}
