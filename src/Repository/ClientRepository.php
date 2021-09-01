<?php

namespace App\Repository;

use App\Entity\Client;
use App\Entity\Invoice;
use DateInterval;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method Client|null findOneBy(array $criteria, array $orderBy = null)
 * @method Client[]    findAll()
 * @method Client[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

    public function queryBuilder(): ?QueryBuilder
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.createdAt');
    }

    public function findClientsWithoutInvoiceForTheBillingPeriod(
        DateInterval $interval
    ): array {
        $qb = $this->createQueryBuilder('c');

        return $qb->andWhere(
                $qb->expr()->not(
                    $qb->expr()->exists(
                        $this->_em->createQueryBuilder()
                            ->select('i')
                            ->from(Invoice::class, 'i')
                            ->andWhere('i.client = c.id')
                            ->andWhere('i.issuedAt > :period')
                            ->getDQL()
                    )
                )
            )
            ->andWhere('c.active = true')
            ->setParameters(
                [
                    'period' => (new DateTime())->sub($interval),
                ]
            )
            ->getQuery()
            ->getResult();
    }
}
