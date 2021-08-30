<?php

namespace App\Message;

use Symfony\Component\Uid\Uuid;

class CreateInvoicePdf
{
    public function __construct(
        private Uuid $invoiceId
    ) {
    }

    public function getInvoiceId(): Uuid
    {
        return $this->invoiceId;
    }
}
