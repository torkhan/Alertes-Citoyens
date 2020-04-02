<?php

namespace App\Repository;

use App\Entity\TypeDestinataire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypeDestinataire|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeDestinataire|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeDestinataire[]    findAll()
 * @method TypeDestinataire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeDestinataireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeDestinataire::class);
    }

    // /**
    //  * @return TypeDestinataire[] Returns an array of TypeDestinataire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeDestinataire
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
