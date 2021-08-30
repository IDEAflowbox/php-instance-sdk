<?php

namespace App\Service\Invoice;

use App\Entity\Invoice;

interface InvoicePdfReaderInterface
{
    public function read(Invoice $invoice): ?string;
}
