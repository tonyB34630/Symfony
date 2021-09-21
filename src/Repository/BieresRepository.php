<?php

namespace App\Repository;

use App\Entity\Bieres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bieres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bieres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bieres[]    findAll()
 * @method Bieres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BieresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bieres::class);
    }

    // /**
    //  * @return Bieres[] Returns an array of Bieres objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bieres
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
