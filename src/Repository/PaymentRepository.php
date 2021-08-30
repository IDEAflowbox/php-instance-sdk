<?php

namespace App\Repository;

use App\Entity\Client;
use App\Entity\Invoice;
use App\Entity\Payment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Payment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Payment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Payment[]    findAll()
 * @method Payment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaymentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Payment::class);
    }

    public function createQueryBuilderWithClient(
        Client $client
    ): QueryBuilder {
        return $this->createQueryBuilder('p')
            ->join('p.invoice', 'i')
            ->andWhere('i.client = :client')
            ->setParameter('client', $client)
            ->orderBy('p.createdAt', 'ASC');
    }

    public function findByInvoice(Invoice $invoice)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.invoice = :invoice')
            ->setParameter('invoice', $invoice)
            ->orderBy('p.createdAt', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
}
