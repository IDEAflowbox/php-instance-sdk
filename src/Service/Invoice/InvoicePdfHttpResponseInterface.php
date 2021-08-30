<?php

namespace App\Service\Invoice;

use App\Entity\Invoice;
use Symfony\Component\HttpFoundation\Response;

interface InvoicePdfHttpResponseInterface
{
    public function response(Invoice $invoice): Response;
}
