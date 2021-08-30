<?php

namespace App\EventSubscriber\Invoice;

use App\Event\Invoice\InvoicePdfCreatedEvent;
use App\Event\Notification\UserInvoiceNotificationEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class InvoiceSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private EventDispatcherInterface $dispatcher
    ) {
    }

    public function onInvoicePdfCreatedEvent(InvoicePdfCreatedEvent $event)
    {
        $invoice = $event->getInvoice();
        $client = $invoice->getClient();

        foreach ($client->getUsers() as $user) {
            $this->dispatcher->dispatch(
                new UserInvoiceNotificationEvent($user, $invoice)
            );
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            InvoicePdfCreatedEvent::class => 'onInvoicePdfCreatedEvent',
        ];
    }
}
