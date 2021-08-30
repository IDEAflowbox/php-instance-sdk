<?php

namespace App\Service\Invoice;

use App\Entity\Invoice;

interface InvoicePdfGeneratorInterface
{
    public function create(Invoice $invoice): void;
}
