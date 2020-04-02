<?php

namespace App\Form;

use App\Entity\TypeService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class TypeServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('serviceType', TextType::class, array(
                "label" => "Nom du type de service",
                "required" => true,
                'constraints' => [
                    new Assert\Length([
                        "min" => 2,
                        "max" => 45,
                        "minMessage" => "Veuillez entrer un nom de type valide",
                        "maxMessage" => "50 caractères maximum",
                    ]),
                ]
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TypeService::class,
        ]);
    }
}
