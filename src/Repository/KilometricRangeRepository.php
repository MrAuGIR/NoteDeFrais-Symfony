<?php

namespace App\Repository;

use App\Entity\KilometricRange;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KilometricRange|null find($id, $lockMode = null, $lockVersion = null)
 * @method KilometricRange|null findOneBy(array $criteria, array $orderBy = null)
 * @method KilometricRange[]    findAll()
 * @method KilometricRange[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KilometricRangeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KilometricRange::class);
    }

    // /**
    //  * @return KilometricRange[] Returns an array of KilometricRange objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KilometricRange
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
