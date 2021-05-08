<?php

namespace App\Repository;

use App\Entity\GroupVehicleCat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GroupVehicleCat|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupVehicleCat|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupVehicleCat[]    findAll()
 * @method GroupVehicleCat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupVehicleCatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupVehicleCat::class);
    }

    // /**
    //  * @return GroupVehicleCat[] Returns an array of GroupVehicleCat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupVehicleCat
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
