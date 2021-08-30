<?php

namespace App\Repository;

use App\Entity\BillingOption;
use App\Entity\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BillingOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method BillingOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method BillingOption[]    findAll()
 * @method BillingOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BillingOptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BillingOption::class);
    }

    public function findOneByClient(Client $client): ?BillingOption
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.client = :client')
            ->setParameter('client', $client)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
