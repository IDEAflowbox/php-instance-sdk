<?php

namespace App\Service\Invoice;

use App\Entity\Invoice;
use Gaufrette\Filesystem;

class InvoicePdfReader implements InvoicePdfReaderInterface
{
    public function __construct(
        private Filesystem $invoicesFs
    ) {
    }

    public function read(Invoice $invoice): ?string
    {
        if (empty($invoice->getFileName()) || !$this->invoicesFs->has($invoice->getFileName())) {
            return null;
        }

        return $this->invoicesFs->get($invoice->getFileName())->getContent();
    }
}
