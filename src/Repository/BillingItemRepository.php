<?php

namespace App\Repository;

use App\Entity\BillingItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BillingItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method BillingItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method BillingItem[]    findAll()
 * @method BillingItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BillingItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BillingItem::class);
    }

    // /**
    //  * @return BillingItem[] Returns an array of BillingItem objects
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
    public function findOneBySomeField($value): ?BillingItem
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
