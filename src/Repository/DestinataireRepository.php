<?php

namespace App\Repository;

use App\Entity\Destinataire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Response;
use Symfony\Component\Validator\Constraints\All;

/**
 * @method Destinataire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Destinataire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Destinataire[]    findAll()
 * @method Destinataire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DestinataireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Destinataire::class);
    }


    public function RechercheDestinataire($nom, $rue, $ville)
    {
        $search = $this->createQueryBuilder('d');

        if ($nom != null) {
            $search->andWhere('d.nomDestinataire LIKE :nom');
            $search->setParameter('nom', "%" . $nom . "%");
        }


        if ($rue != null) {
            $search->andWhere('d.nomRueDestinataire1 LIKE :rue');
            $search->setParameter('rue', '%' . $rue . '%');
        }

        if ($ville != null) {
            $search->andWhere('d.idAdresse = :ville');
            $search->setParameter('ville', $ville);
        }


//        $search->andWhere('d.statutDestinataire = 1');
//        $search->andWhere('d.etatValidation = "accepté"');
        $search->orderBy('d.id', 'DESC');
        return $search->getQuery()->getResult();
    }


    // /**
    //  * @return Destinataire[] Returns an array of Destinataire objects
    //  */

    public function findByExampleField(EntityManagerInterface $em): Response
    {
        $queryBuilder = $em->getRepository(Destinataire::class)->createQueryBuilder('d');
        $qb = $em->createQueryBuilder();
        $queryBuilder->andWhere('d.idValidation = :1');
        $jobs = $queryBuilder->getQuery()->getResult();
        $qb->select('u')
            ->from('Destinaire', 'u')
            ->where('u.id = ?1');
    }



    public function findOneBySomeField($idValidation): ?Destinataire
    {
       /* return $this->createQueryBuilder('d')
            ->andWhere('d.idValidation = :1')
            ->setParameter('val', $idValidation)
            ->getQuery()
            ->getOneOrNullResult()
        ;*/
    }

    public function RechercheAccept( $idValidation): ?Destinataire
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.idValidation = :1')
            ->setParameter('val', $idValidation);
            /*->getQuery();*/
       /*
             $search->select('d')
                 ->from(Destinataire::class,'d')
                 ->where($idValidation = 1);*/



/*
        $search->orderBy('d.id', 'DESC');
        return $search->getQuery()->getResult();*/

    }
}
