<?php

namespace App\Form;

use App\Entity\Adresse;
use App\Entity\Destinataire;
use App\Repository\AdresseRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomDestinataire', TextType::class,[
                'label' => 'Nom',
                'required' => false,
            ])
            ->add('nomRueDestinataire1', TextType::class,[
                'label' => 'Nom de la rue',
                'required'=> false,
            ])
            ->add('idAdresse',EntityType::class,[
                'class' => Adresse::class,
                'label' => 'Ville',
                'placeholder' => "Ville",
                'required' => false,
                'query_builder' => function (AdresseRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.nomVille', 'ASC');
                },
                'choice_label' => 'nomVille',
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