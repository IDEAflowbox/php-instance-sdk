<?php

namespace App\Repository;

use App\Entity\Client;
use App\Entity\ExternalApiConfig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExternalApiConfig|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExternalApiConfig|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExternalApiConfig[]    findAll()
 * @method ExternalApiConfig[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExternalApiConfigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExternalApiConfig::class);
    }

    public function findOneByClient(Client $client): ?ExternalApiConfig
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.client = :client')
            ->setParameter('client', $client)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
