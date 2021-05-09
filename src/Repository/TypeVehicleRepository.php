<?php

namespace App\Repository;

use App\Entity\TypeVehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeVehicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeVehicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeVehicle[]    findAll()
 * @method TypeVehicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeVehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeVehicle::class);
    }

    // /**
    //  * @return TypeVehicle[] Returns an array of TypeVehicle objects
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
    public function findOneBySomeField($value): ?TypeVehicle
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
