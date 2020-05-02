<?php

namespace App\Form;

use App\Entity\Destinataire;
use App\Entity\Intervention;
use App\Entity\Message;
use App\Entity\TypeIntervention;
use App\Entity\TypeMessage;
use App\Entity\User;
use App\Repository\DestinataireRepository;
use App\Repository\InterventionRepository;
use App\Repository\TypeInterventionRepository;
use App\Repository\TypeMessageRepository;
use App\Repository\UserRepository;
use Stfalcon\Bundle\TinymceBundle\StfalconTinymceBundle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idTypeMessage',EntityType::class,[
            'class' => TypeMessage::class,
            'label' => 'Titre message',
            'query_builder' => function (TypeMessageRepository $er) {
                return $er->createQueryBuilder('v')
                    ->orderBy('v.messageType', 'ASC');
            },
            'choice_label' => 'messageType',
        ])
            ->add('idIntervention',EntityType::class,[
            'class' => Intervention::class,
            'label' => 'Intervention',
            'query_builder' => function (InterventionRepository $er) {
                return $er->createQueryBuilder('v')
                    ->orderBy('v.nomIntervention', 'ASC');
            },
            'choice_label' => 'nomIntervention',
        ])
            ->add('dateEnvoi', DateType::class,[
                'required' => true,
                'label' => "Date d'envoi",
                "widget"=> 'single_text'
            ])
            ->add('contenuMessage', TextareaType::class,[
                'required' => false,
                'attr' => array(
                    'class' => 'tinymce'// Skip it if you want to use default theme
                ),
                'label' => "Votre message :",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre rue doit contenir au minimum {{3}} charactères',
                        'max' => 1500,
                        'maxMessage' => 'votre rue ne peux contenir que {{1500}} charactères au maximum'
                    ]),
                ],
            ])
            ->add('dateDebutIntervention', DateType::class,[

                'required' => true,
                'label' => "Date de début",
                "widget"=> 'single_text'

            ])
            ->add('dateFinIntervention', DateType::class,[

                'required' => true,
                'label' => "Date de fin prévue",
                "widget"=> 'single_text'

            ])

            /*->add('statutMessage', TextType::class,[
                'required' => true,
                'label' => "Statut du message",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre rue doit contenir au minimum {{3}} charactères',
                        'max' => 150,
                        'maxMessage' => 'votre rue ne peux contenir que {{150}} charactères au maximum'
                    ]),
                ],
            ])*/
            ->add('image1', FileType::class,[
                'required' => false,
                'label' => "Image 1",
            ])
            ->add('image2', FileType::class,[
                'required' => false,
                'label' => "Image 2",
            ])
            ->add('image3', FileType::class,[
                'required' => false,
                'label' => "Image 3",
            ])
           /* ->add('dateModificationMessage', DateType::class,[
                'required' => false,
                'label' => "Date modification"
            ])*/
            ->add('commentaireMessage', TextType::class,[
                'required' => false,
                'label' => "Commentaires",
                'constraints' => [

                    new Assert\Length([
                        'min' => 3,
                        'minMessage' => 'Votre rue doit contenir au minimum {{3}} charactères',
                        'max' => 1500,
                        'maxMessage' => 'votre rue ne peux contenir que {{1500}} charactères au maximum'
                    ]),
                ],
            ])
            ->add('idUtilisateur',EntityType::class,[
                'class' => User::class,
                'label' => 'Rédacteur du message',
                'query_builder' => function (UserRepository $er) {
                    return $er->createQueryBuilder('v')
                        ->orderBy('v.nomUtilisateur', 'ASC');
                },
                'choice_label' => 'nomUtilisateur',
            ])

            /*->add('idDestinataire',EntityType::class,[
                'class' => Destinataire::class,
                'label' => 'Destinataires',
                'query_builder' => function (DestinataireRepository $er) {
                    return $er->createQueryBuilder('v')
                        ->orderBy('v.nomDestinataire', 'ASC');
                },
                'choice_label' => 'nomDestinataire',
            ])*/

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
