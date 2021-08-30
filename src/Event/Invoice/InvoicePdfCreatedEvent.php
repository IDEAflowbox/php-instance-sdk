<?php

namespace App\Event\Invoice;

use App\Entity\Invoice;
use Symfony\Contracts\EventDispatcher\Event;

class InvoicePdfCreatedEvent extends Event
{
    public function __construct(
        private Invoice $invoice
    ) {
    }

    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }
}
