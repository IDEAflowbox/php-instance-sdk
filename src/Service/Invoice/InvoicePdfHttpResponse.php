<?php

namespace App\Service\Invoice;

use App\Entity\Invoice;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Contracts\Translation\TranslatorInterface;

class InvoicePdfHttpResponse implements InvoicePdfHttpResponseInterface
{
    public function __construct(
        private InvoicePdfReaderInterface $reader,
        private TranslatorInterface $translator
    ) {
    }

    public function response(Invoice $invoice): Response
    {
        $content = $this->reader->read($invoice);
        if (null === $content) {
            throw new NotFoundHttpException();
        }

        return new Response($content, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment;filename="'.sprintf($this->translator->trans('Invoice %d'), $invoice->getNumber()).'.pdf"',
        ]);
    }
}
