<?php

namespace App\Repository;

use App\Entity\IssuerAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IssuerAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method IssuerAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method IssuerAddress[]    findAll()
 * @method IssuerAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IssuerAddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IssuerAddress::class);
    }
}
