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

    public function queryBuilder(?string $search = null): ?QueryBuilder
    {
        $qb = $this->createQueryBuilder('c');

        if (!empty($search)) {
            $qb->join('c.billingAddress', 'ba');
            $qb->where('c.firstName LIKE :search');
            $qb->orWhere('c.lastName LIKE :search');
            $qb->orWhere('ba.firstName LIKE :search');
            $qb->orWhere('ba.lastName LIKE :search');
            $qb->orWhere('ba.companyName LIKE :search');
            $qb->orWhere('ba.zipCode LIKE :search');
            $qb->orWhere('ba.city LIKE :search');
            $qb->orWhere('ba.street LIKE :search');
            $qb->orWhere('ba.country LIKE :search');
            $qb->setParameter('search', '%'.$search.'%');
        }

        return $qb->orderBy('c.createdAt');
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
