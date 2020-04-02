<?php

namespace App\DataFixtures;

use App\Entity\Service;
use App\Repository\TypeServiceRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class ServiceFixtures extends Fixture
{

    private $edf;
    private $comm;

    public function __construct(TypeServiceRepository $typeServiceRepository) {
        $this->edf = $typeServiceRepository->findOneBy(['serviceType'=>"EDF"]);
        $this->comm = $typeServiceRepository->findOneBy(['serviceType'=>"Communauté de Communes"]);
    }

    public function load(ObjectManager $manager)
    {
//        $service1 = new Service();
//        $service1->setIdTypeService($this->edf);
//
//        $service1->setNomService("EDF GDF Douai");
//        $service1->setNumeroRueService("981");
//        $service1->setNomRueService1("Boulevard de la République");
//        $service1->setCpService("59530");
//        $service1->setVilleService("Douai");
//        $service1->setNumeroTelephoneService("09 77 42 34 26");
//        $service1->setDateModificationService(new \DateTime('now'));
//
//
//
//        $service2 = new Service();
//        $service2->setIdTypeService($this->comm);
//
//        $service2->setNomService("DOUAISIS AGGLO");
//        $service2->setNumeroRueService("746");
//        $service2->setNomRueService1("Rue Jean Perrin");
//        $service2->setNomRueService2("Parc d'activités de Doriginies");
//        $service2->setCpService("59351");
//        $service2->setVilleService("Douai");
//        $service2->setAdresseMailService("douaisis-aglo@contact.com");
//        $service2->setNumeroTelephoneService("0327998989");
//        $service2->setCommentaireService("Service de l'agglomération de Douai");
//        $service2->setDateModificationService(new \DateTime('now'));
//
//
//
//
//        $service3 = new Service();
//        $service3->setIdTypeService($this->comm);
//
//        $service3->setNomService("Communauté Urbaine d'Arras");
//        $service3->setNumeroRueService("146");
//        $service3->setNomRueService1("Allée du Bastion de la reine");
//        $service3->setCpService("62000");
//        $service3->setVilleService("Arras");
//        $service3->setNumeroTelephoneService("03-21-21-87-00");
//        $service3->setDateModificationService(new \DateTime('now'));
//
//        $manager->persist($service1);
//        $manager->persist($service2);
//        $manager->persist($service3);
//
//        $manager->flush();
    }
}
