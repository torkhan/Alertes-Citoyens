<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class

UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
//        $user1 = new User();
//        $user1->setIdService(1);
//
//        $user1->setUsername("Luc01");
//        $pass1 = $this->encoder->encodePassword($user1, "mdp123456");
//        $user1->setPassword($pass1);
//        $user1->setRoles(['ROLE_ADMIN']);
//        $user1->setCreateAt(\DateTime::createFromFormat("d-m-Y", "12-02-2020"));
//        $user1->setNomUtilisateur("Delannoy");
//        $user1->setPrenomUtilisateur("Luc");
//        $user1->setEmail("luc.delannoy@gmail.com");
//        $user1->setStatut(1);
//        $user1->setDateModificationUtilisateur(\DateTime::createFromFormat("d-m-Y", "14-02-2020"));
//        $user1->setCommentaireUtilisateur('Lorem ipsum lorem');
//
//
//        $user2 = new User();
//        $user2->setIdService(2);
//
//        $user2->setUsername("Celine02");
//        $pass2 = $this->encoder->encodePassword($user2, "mdp123456");
//        $user2->setPassword($pass2);
//        $user2->setRoles(['ROLE_USER']);
//        $user2->setCreateAt(\DateTime::createFromFormat("d-m-Y", "15-02-2020"));
//        $user2->setNomUtilisateur("Joubert");
//        $user2->setPrenomUtilisateur("Céline");
//        $user2->setEmail("celine.joubert@gmail.com");
//        $user2->setStatut(1);
//
//
//        $user3 = new User();
//        $user3->setIdService(3);
//
//        $user3->setUsername("Seb03");
//        $pass3 = $this->encoder->encodePassword($user3, "mdp123456");
//        $user3->setPassword($pass3);
//        $user3->setRoles(['ROLE_USER']);
//        $user3->setCreateAt(\DateTime::createFromFormat("d-m-Y", "18-02-2020"));
//        $user3->setNomUtilisateur("Roux");
//        $user3->setPrenomUtilisateur("Sébastien");
//        $user3->setEmail("sebastien.roux@gmail.com");
//        $user3->setStatut(0);
//        $user3->setDateModificationUtilisateur(\DateTime::createFromFormat("d-m-Y", "19-02-2020"));
//        $user3->setCommentaireUtilisateur('Ipsum');
//
//        $manager->persist($user1);
//        $manager->persist($user2);
//        $manager->persist($user3);
//
//        $manager->flush();
    }
}
