<?php

namespace App\Repository;

use App\Entity\Invoice;
use App\Entity\InvoiceItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InvoiceItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvoiceItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvoiceItem[]    findAll()
 * @method InvoiceItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvoiceItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvoiceItem::class);
    }

    public function findByInvoice(Invoice $invoice)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.invoice = :invoice')
            ->setParameter('invoice', $invoice->getId()->toBinary())
            ->orderBy('i.createdAt', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
