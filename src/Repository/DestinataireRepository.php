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


    public function RechercheDestinataire($nom, $rue, $ville, $idvalidation)
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

  /*  public function findByExampleField(EntityManagerInterface $em): Response
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }*/



    public function findOneBySomeField($idValidation)
    {
        $search = $this->createQueryBuilder('d');
        if($idValidation !== null){
            $search->andWhere('d.idValidation = 1');
        }
        return $search->getQuery()->getResult();
    }
    public function setValidation($idValidation)
    {
        $search = $this->createQueryBuilder('d');
        if($idValidation !== null){

            $search->andWhere('d.idValidation = 1');
        }
        return $search->getQuery()->getResult();
    }

    public function RechercheAccept($idValidation)
    {
        /*$search = $this->createQueryBuilder('d');
        if($idValidation !== null){
            $search->Where('d.idValidation.id = :1');
            $search->setParameter('idValidation', "%".$idValidation."%");

        }dd($idValidation);

        return $search->getQuery()->getResult();*/


    }

}
