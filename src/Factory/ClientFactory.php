<?php

namespace App\Factory;

use App\Dto\CreateClientDto;
use App\Entity\BillingAddress;
use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;

class ClientFactory
{
    public function __construct(
        private EntityManagerInterface $em
    ) {
    }

    public function __invoke(CreateClientDto $dto)
    {
        $client = $this->createClient($dto);
        $billingAddress = $this->createBillingAddress($dto);

        $billingAddress->setClient($client);

        $this->em->persist($client);
        $this->em->persist($billingAddress);
        $this->em->flush();

        return $client;
    }

    private function createClient(CreateClientDto $dto): Client
    {
        return (new Client())
            ->setFirstName($dto->getFirstName())
            ->setLastName($dto->getLastName());
    }

    private function createBillingAddress(CreateClientDto $dto): BillingAddress
    {
        return (new BillingAddress())
            ->setFirstName($dto->getFirstName())
            ->setLastName($dto->getLastName())
            ->setCompanyName($dto->getCompanyName())
            ->setTaxId($dto->getTaxId())
            ->setStreet($dto->getStreet())
            ->setPropertyNumber($dto->getPropertyNumber())
            ->setCity($dto->getCity())
            ->setZipCode($dto->getZipCode())
            ->setCountry($dto->getCountry())
            ;
    }
}
