<?php

namespace App\Controller\Account\Billing\Invoice;

use App\Entity\Invoice;
use App\Security\Voter\InvoiceVoter;
use App\Service\Invoice\InvoicePdfHttpResponseInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceDownloadController extends AbstractController
{
    #[Route('/account/billing/invoice/{id}/download', name: 'account_billing_invoice_download')]
    public function index(
        Invoice $invoice,
        InvoicePdfHttpResponseInterface $pdf
    ): Response {
        $this->denyAccessUnlessGranted(InvoiceVoter::INVOICE_VIEW, $invoice);

        return $pdf->response($invoice);
    }
}
