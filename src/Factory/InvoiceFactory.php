<?php

namespace App\Factory;

use App\Entity\BillingItem;
use App\Entity\Client;
use App\Entity\Invoice;
use App\Entity\InvoiceAddress;
use App\Entity\InvoiceItem;
use App\Repository\InvoiceRepository;
use Doctrine\ORM\EntityManagerInterface;

class InvoiceFactory
{
    public function __construct(
        private EntityManagerInterface $em,
        private InvoiceRepository $invoiceRepository
    ) {
    }

    public function create(Client $client): Invoice
    {
        $invoice = $this->createInvoice($client);

        $customerAddress = $this->createCustomerAddress($client, $invoice);
        $issuerAddress = $this->createIssuerAddress($client, $invoice);

        $this->createItems($client, $invoice);

        $this->em->persist($invoice);
        $this->em->persist($customerAddress);
        $this->em->persist($issuerAddress);
        $this->em->flush();

        return $invoice;
    }

    private function createInvoice(
        Client $client
    ): Invoice {
        return (new Invoice())
            ->setClient($client)
            ->setPaid(true)
            ->setDeliveryDate(new \DateTimeImmutable())
            ->setIssuedAt(new \DateTimeImmutable())
            ->setDueDate(new \DateTimeImmutable('+2 week'))
            ->setNumber($this->invoiceRepository->getNextNumber())
            ->setBankAccount($client->getBillingOption()->getIssuerAddress()->getBankAccount());
    }

    private function createCustomerAddress(Client $client, Invoice $invoice): InvoiceAddress
    {
        $billingAddress = $client->getBillingAddress();

        return (new InvoiceAddress())
            ->setInvoice($invoice)
            ->setType(InvoiceAddress::TYPE_CUSTOMER)
            ->setFirstName($billingAddress->getFirstName())
            ->setLastName($billingAddress->getLastName())
            ->setCompanyName($billingAddress->getCompanyName())
            ->setTaxId($billingAddress->getTaxId())
            ->setStreet($billingAddress->getStreet())
            ->setPropertyNumber($billingAddress->getPropertyNumber())
            ->setCity($billingAddress->getCity())
            ->setZipCode($billingAddress->getZipCode())
            ->setCountry($billingAddress->getCountry())
            ;
    }

    private function createIssuerAddress(Client $client, Invoice $invoice): InvoiceAddress
    {
        $issuerAddress = $client->getBillingOption()->getIssuerAddress();

        return (new InvoiceAddress())
            ->setInvoice($invoice)
            ->setType(InvoiceAddress::TYPE_ISSUER)
            ->setFirstName($issuerAddress->getFirstName())
            ->setLastName($issuerAddress->getLastName())
            ->setCompanyName($issuerAddress->getCompanyName())
            ->setTaxId($issuerAddress->getTaxId())
            ->setStreet($issuerAddress->getStreet())
            ->setPropertyNumber($issuerAddress->getPropertyNumber())
            ->setCity($issuerAddress->getCity())
            ->setZipCode($issuerAddress->getZipCode())
            ->setCountry($issuerAddress->getCountry())
            ;
    }

    private function createItems(Client $client, Invoice $invoice): void
    {
        $valueNet = 0;
        $valueVat = 0;
        $valueGross = 0;

        /** @var BillingItem $billingItem */
        foreach ($client->getBillingItems() as $billingItem) {
            $valueNet += $billingItem->getValueNet();
            $valueVat += $billingItem->getValueVat();
            $valueGross += $billingItem->getValueGross();

            $invoice->getItems()->add(
                (new InvoiceItem())
                    ->setInvoice($invoice)
                    ->setName($billingItem->getName())
                    ->setQuantity($billingItem->getQuantity())
                    ->setUnitPrice($billingItem->getUnitPrice())
                    ->setValueNet($billingItem->getValueNet())
                    ->setValueGross($billingItem->getValueGross())
                    ->setValueVat($billingItem->getValueVat())
                    ->setVatRate($billingItem->getVatRate())
            );
        }

        $invoice->setValueNet($valueNet);
        $invoice->setValueVat($valueVat);
        $invoice->setValueGross($valueGross);
    }
}
