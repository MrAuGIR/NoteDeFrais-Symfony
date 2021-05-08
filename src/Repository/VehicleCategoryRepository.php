<?php

namespace App\Repository;

use App\Entity\VehicleCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VehicleCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehicleCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehicleCategory[]    findAll()
 * @method VehicleCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehicleCategory::class);
    }

    // /**
    //  * @return VehicleCategory[] Returns an array of VehicleCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VehicleCategory
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
