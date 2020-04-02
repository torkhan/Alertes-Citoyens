<?php

namespace App\Form;

use App\Entity\Service;
use App\Entity\TypeService;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomService', TextType::class, array(
                'label' => "Nom du service",
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank([
                        "message" => "Veuillez renseigner le nom du service"
                    ]),
                    new Assert\Length([
                        "min" => 2,
                        "max" => 45,
                        "minMessage" => "Veuillez entrer un nom de service valide",
                        "maxMessage" => "Veuillez entrer un nom de service valide",
                    ]),
                ]
            ))
            ->add('numeroRueService', TextType::class, array(
                'label' => "Numéro de Rue",
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank([
                        "message" => "Veuillez renseigner le numéro de rue"
                    ]),
                    new Assert\Length([
                        "min" => 1,
                        "max" => 10,
                        "minMessage" => "Veuillez entrer un numéro de rue valide",
                        "maxMessage" => "Veuillez entrer un numéro de rue valide",
                    ]),
                ]
            ))
            ->add('nomRueService1', TextType::class, array(
                'label' => "Nom de rue",
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank([
                        "message" => "Veuillez renseigner le nom de la rue"
                    ]),
                    new Assert\Length([
                        "min" => 2,
                        "max" => 85,
                        "minMessage" => "Veuillez entrer un nom de rue valide",
                        "maxMessage" => "Veuillez entrer un nom de rue valide",
                    ]),
                ]
            ))
            ->add('nomRueService2', TextType::class, array(
                'label' => "Complément d'adresse",
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        "min" => 0,
                        "max" => 45,
                        "maxMessage" => "Veuillez entrer un complément d'adresse valide",
                    ]),
                ]
            ))
            ->add('cpService', NumberType::class, array(
                'label' => "Code postal",
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank([
                        "message" => "Veuillez renseigner le code postal"
                    ]),
                ]
            ))
            ->add('villeService', TextType::class, array(
                'label' => "Ville du service",
                'required' => true,
                'constraints' => [
                    new Assert\NotBlank([
                        "message" => "Veuillez renseigner le nom de la ville"
                    ]),
                    new Assert\Length([
                        "min" => 2,
                        "max" => 85,
                        "minMessage" => "Veuillez entrer un nom de ville valide",
                        "maxMessage" => "Veuillez entrer un nom de ville valide",
                    ]),
                ]
            ))
            ->add('adresseMailService', TextType::class, array(
                'label' => "Adresse mail du service",
                'required' => true,
                "help" => "Veuillez saisir au minimum une adresse mail ou un numéro de téléphone",
                'constraints' => [
                    new Assert\Length([
                        "min" => 0,
                        "max" => 200,
                        "maxMessage" => "Veuillez entrer une adresse mail valide",
                    ]),
                ]
            ))
            ->add('numeroTelephoneService', TextType::class, array(
                'label' => "Numéro de Téléphone",
                'required' => true,
                "help" => "Veuillez saisir au minimum une adresse mail ou un numéro de téléphone",
                'constraints' => [
                    new Assert\Length([
                        "min" => 0,
                        "max" => 20,
                        "maxMessage" => "Veuillez entrer un numéro de téléphone valide",
                    ]),
                ]
            ))
            ->add('commentaireService', TextareaType::class, array(
                'label' => "Commentaire sur le service",
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        "min" => 0,
                        "max" => 999,
                        "maxMessage" => "Nombre de caractères limité.",
                    ]),
                ]
            ))
            ->add('idTypeService', EntityType::class, [
                'label' => 'Type',
                'placeholder' => "Sélectionner un type",
                'class' => TypeService::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('ts')
                        ->orderBy('ts.serviceType', 'ASC');
                },
                'choice_label' => 'serviceType',
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
