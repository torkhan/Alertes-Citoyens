<?php

namespace App\Form;

use App\Entity\Intervention;
use App\Entity\TypeDestinataire;
use App\Entity\TypeIntervention;
use App\Repository\TypeInterventionRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;


class InterventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nomIntervention', TextType::class,[
                'required' => true,
                'label' => "Nom de l'intervention",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre nom d\'intervention doit contenir au minimum {{3}} charactères',
                        'max' => 150,
                        'maxMessage' => 'votre nom d\'intervention ne peux contenir que {{150}} charactères au maximum'
                    ]),
                ],
            ])
            ->add('rueIntervention', TextType::class,[
                'required' => true,
                'label' => "rue(s) concernée(s)",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre nom de rue doit contenir au minimum {{3}} charactères',
                        'max' => 150,
                        'maxMessage' => 'votre nom de rue ne peux contenir que {{150}} charactères au maximum'
                    ]),
                ],
            ])
            ->add('villeIntervention', TextType::class,[
                'required' => true,
                'label' => "Ville(s) concernée(s)",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre rue doit contenir au minimum {{3}} charactères',
                        'max' => 150,
                        'maxMessage' => 'votre rue ne peux contenir que {{150}} charactères au maximum'
                    ]),
                ],
            ])
            ->add('longitude', TextType::class,[
                'required' => false,
                'label' => "Longitude",
            ])
            ->add('latitude', TextType::class,[
                'required' => false,
                'label' => "Latitude",
            ])
            ->add('dateDebutIntervention', DateType::class,[
                'required' => true,
                'label' => "Date de début",
            ])
            ->add('dateFinIntervention', DateType::class,[
                'required' => false,
                'label' => "Date de fin",
            ])
            ->add('commentaireIntervention', TextType::class,[
                'required' => false,
                'label' => "Commentaires",
                'constraints' => [

                    new Assert\Length([
                        'max' => 150,
                        'maxMessage' => 'votre commentaire ne peux contenir que {{300}} charactères au maximum'
                    ]),
                ],
            ])
           /* ->add('dateModificationIntervention', DATEType::class,[
                'required' => false,
                'label' => "Date de modification",
            ])*/
            ->add('idTypeIntervention',EntityType::class,[
                'class' => TypeIntervention::class,
                'label' => 'Type d\'intervention?',
                'query_builder' => function (TypeInterventionRepository $er) {
                    return $er->createQueryBuilder('v')
                        ->orderBy('v.interventionType', 'ASC');
                },
                'choice_label' => 'interventionType',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Intervention::class,
        ]);
    }
}
