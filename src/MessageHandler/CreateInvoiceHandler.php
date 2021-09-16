<?php

namespace App\MessageHandler;

use App\Entity\Client;
use App\Factory\InvoiceFactory;
use App\Message\CreateInvoice;
use App\Message\CreateInvoicePdf;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class CreateInvoiceHandler implements MessageHandlerInterface
{
    public function __construct(
        private EntityManagerInterface $em,
        private InvoiceFactory $invoiceFactory,
        private MessageBusInterface $bus
    ) {
    }

    public function __invoke(CreateInvoice $message): void
    {
        $client = $this->em
            ->getRepository(Client::class)
            ->find($message->getClientId());

        if (null === $client) {
            return;
        }

        $invoice = $this->invoiceFactory->create($client);

        $this->bus->dispatch(new CreateInvoicePdf($invoice->getId()));
    }
}
