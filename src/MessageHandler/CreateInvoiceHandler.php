<?php

namespace App\MessageHandler;

use App\Entity\Client;
use App\Message\CreateInvoice;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateInvoiceHandler implements MessageHandlerInterface
{
    public function __construct(
        private EntityManagerInterface $em,
        private EventDispatcherInterface $dispatcher,
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
    }
}
