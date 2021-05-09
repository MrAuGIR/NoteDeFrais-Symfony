<?php

namespace App\Repository;

use App\Entity\TaxHorsePower;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TaxHorsePower|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxHorsePower|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxHorsePower[]    findAll()
 * @method TaxHorsePower[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxHorsePowerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TaxHorsePower::class);
    }

    // /**
    //  * @return TaxHorsePower[] Returns an array of TaxHorsePower objects
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
    public function findOneBySomeField($value): ?TaxHorsePower
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
