<?php

namespace App\Repository;

use App\Entity\Invoice;
use App\Entity\InvoiceAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InvoiceAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvoiceAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvoiceAddress[]    findAll()
 * @method InvoiceAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvoiceAddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvoiceAddress::class);
    }

    /**
     * @return InvoiceAddress[]
     */
    public function findByInvoice(Invoice $invoice): array
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.invoice = :invoice')
            ->setParameter('invoice', $invoice->getId()->toBinary())
            ->orderBy('i.createdAt', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneByInvoiceAndType(
        Invoice $invoice,
        string $type
    ): ?InvoiceAddress {
        return $this->createQueryBuilder('i')
            ->andWhere('i.invoice = :invoice')
            ->setParameter('invoice', $invoice->getId()->toBinary())
            ->andWhere('i.type = :type')
            ->setParameter('type', $type)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
