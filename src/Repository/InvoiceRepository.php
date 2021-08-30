<?php

namespace App\Repository;

use App\Entity\Client;
use App\Entity\Invoice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Invoice|null find($id, $lockMode = null, $lockVersion = null)
 * @method Invoice|null findOneBy(array $criteria, array $orderBy = null)
 * @method Invoice[]    findAll()
 * @method Invoice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvoiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Invoice::class);
    }

    public function createQueryBuilderWithClient(
        Client $client
    ): QueryBuilder {
        return $this->createQueryBuilder('i')
            ->andWhere('i.client = :client')
            ->setParameter('client', $client)
            ->orderBy('i.createdAt', 'DESC');
    }

    public function findAllByClient(
        Client $client,
        int $offset = 0,
        int $limit = 100
    ) {
        return $this->createQueryBuilder('i')
            ->andWhere('i.client = :client')
            ->setParameter('client', $client)
            ->orderBy('i.id', 'ASC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneByNumber(string $number): ?Invoice
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.number = :number')
            ->setParameter('number', $number)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findLastByClient(Client $client): ?Invoice
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.client = :client')
            ->setParameter('client', $client)
            ->orderBy('i.issuedAt', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
}
