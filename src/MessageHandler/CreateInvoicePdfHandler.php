<?php

namespace App\MessageHandler;

use App\Entity\Invoice;
use App\Event\Invoice\InvoicePdfCreatedEvent;
use App\Message\CreateInvoicePdf;
use App\Service\Invoice\InvoicePdfGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateInvoicePdfHandler implements MessageHandlerInterface
{
    public function __construct(
        private InvoicePdfGenerator $generator,
        private EntityManagerInterface $em,
        private EventDispatcherInterface $dispatcher,
    ) {
    }

    public function __invoke(CreateInvoicePdf $message): void
    {
        $invoice = $this->em
            ->getRepository(Invoice::class)
            ->find($message->getInvoiceId());

        if (null === $invoice) {
            return;
        }

        $this->generator->create($invoice);
        $this->dispatcher->dispatch(
            new InvoicePdfCreatedEvent($invoice)
        );
    }
}
