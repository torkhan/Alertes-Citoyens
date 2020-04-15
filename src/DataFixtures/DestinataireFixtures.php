<?php

namespace App\DataFixtures;

use App\Entity\Destinataire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DestinataireFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
//        $destinataire1 = new Destinataire();
//        $destinataire1->setIdTypeDestinataire(1);
//        $destinataire1->setIdValidation(2);
//        $destinataire1->setIdAdresse(1);
//        $destinataire1->setIdMotif(1);
//
//        $destinataire1->setPrenomDestinataire("Agnès");
//        $destinataire1->setNomDestinataire("Chauvet");
//        $destinataire1->setAdresseMailDestinataire("agnes-chauvet@gmail.com");
//        $destinataire1->setNumeroTelephoneDestinataire("0625252525");
//        $destinataire1->setNumeroRueDestinataire("241");
//        $destinataire1->setNomRueDestinataire1("route de Lens");
//        $destinataire1->setNomRueDestinataire2("Appt 12");
//        $destinataire1->setOkSmsDestinataire(1);
//        $destinataire1->setOkMailDestinataire(1);
//        $destinataire1->setAccordRgpdDestinataire(1);
//        $destinataire1->setDateEnregistrementDestinataire(\DateTime::createFromFormat("d-m-Y", "14/03/2020"));
//        $destinataire1->setDateValidationDestinataire(\DateTime::createFromFormat("d-m-Y", "15/03/2020"));
//        $destinataire1->setDateModificationDestinataire(\DateTime::createFromFormat("d-m-Y", "15/03/2020"));
//        $destinataire1->setStatutDestinataire(1);
//
//
//        $destinataire2 = new Destinataire();
//        $destinataire2->setIdTypeDestinataire(1);
//        $destinataire2->setIdValidation(1);
//        $destinataire2->setIdAdresse(1);
//
//        $destinataire1->setPrenomDestinataire("Victor");
//        $destinataire1->setNomDestinataire("Lemaire");
//        $destinataire1->setAdresseMailDestinataire("victor@wanadoo.fr");
//        $destinataire1->setNumeroRueDestinataire("2");
//        $destinataire1->setNomRueDestinataire1("rue d'Amiens");
//        $destinataire1->setOkSmsDestinataire(0);
//        $destinataire1->setOkMailDestinataire(1);
//        $destinataire1->setAccordRgpdDestinataire(1);
//        $destinataire1->setDateEnregistrementDestinataire(\DateTime::createFromFormat("d-m-Y", "14/04/2020"));
//        $destinataire1->setStatutDestinataire(0);
//
//        $destinataire3 = new Destinataire();
//        $destinataire3->setIdTypeDestinataire(1);
//        $destinataire3->setIdValidation(1);
//        $destinataire3->setIdAdresse(2);
//
//        $destinataire1->setPrenomDestinataire("Christophe");
//        $destinataire1->setNomDestinataire("Tanguy");
//        $destinataire1->setNumeroTelephoneDestinataire("0658744844");
//        $destinataire1->setNumeroRueDestinataire("92");
//        $destinataire1->setNomRueDestinataire1("rue Morel");
//        $destinataire1->setOkSmsDestinataire(1);
//        $destinataire1->setOkMailDestinataire(0);
//        $destinataire1->setAccordRgpdDestinataire(1);
//        $destinataire1->setDateEnregistrementDestinataire(\DateTime::createFromFormat("d-m-Y", "21/03/2020"));
//        $destinataire1->setStatutDestinataire(0);
//
//        $destinataire4 = new Destinataire();
//        $destinataire4->setIdTypeDestinataire(1);
//        $destinataire4->setIdValidation(3);
//        $destinataire4->setIdAdresse(2);
//        $destinataire4->setIdMotif(2);
//
//        $destinataire1->setPrenomDestinataire("Nicolas");
//        $destinataire1->setNomDestinataire("Fournier");
//        $destinataire1->setAdresseMailDestinataire("nicolas-f@free.fr");
//        $destinataire1->setNumeroRueDestinataire("8");
//        $destinataire1->setNomRueDestinataire1("rue du grand Marais");
//        $destinataire1->setNomRueDestinataire2("Appt 2bis");
//        $destinataire1->setOkSmsDestinataire(0);
//        $destinataire1->setOkMailDestinataire(1);
//        $destinataire1->setAccordRgpdDestinataire(0);
//        $destinataire1->setDateEnregistrementDestinataire(\DateTime::createFromFormat("d-m-Y", "19/03/2020"));
//        $destinataire1->setDateValidationDestinataire(\DateTime::createFromFormat("d-m-Y", "20/03/2020"));
//        $destinataire1->setDateModificationDestinataire(\DateTime::createFromFormat("d-m-Y", "20/03/2020"));
//        $destinataire1->setStatutDestinataire(0);
//
//
//
//
//        $manager->persist($destinataire1);
//        $manager->persist($destinataire2);
//        $manager->persist($destinataire3);
//        $manager->persist($destinataire4);
//
//        $manager->flush();
        $destinataire = new Destinataire();
        $destinataire->setIdValidation(1);

        $manager->persist($destinataire);
        $manager->flush();

    }
}
