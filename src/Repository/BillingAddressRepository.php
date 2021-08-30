<?php

namespace App\Repository;

use App\Entity\BillingAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BillingAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method BillingAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method BillingAddress[]    findAll()
 * @method BillingAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BillingAddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BillingAddress::class);
    }

    // /**
    //  * @return BillingAddress[] Returns an array of BillingAddress objects
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
    public function findOneBySomeField($value): ?BillingAddress
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
