<?php

namespace App\Service\Invoice;

use App\Bridge\Mpdf\MpdfFactory;
use App\Entity\Invoice;
use App\Entity\InvoiceAddress;
use App\Repository\InvoiceAddressRepository;
use App\Repository\InvoiceItemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Gaufrette\Filesystem;
use Twig\Environment;

class InvoicePdfGenerator implements InvoicePdfGeneratorInterface
{
    public function __construct(
        private InvoiceAddressRepository $addressRepository,
        private InvoiceItemRepository $itemRepository,
        private MpdfFactory $mpdfFactory,
        private Environment $twig,
        private Filesystem $invoicesFs,
        private EntityManagerInterface $em
    ) {
    }

    public function create(Invoice $invoice): void
    {
        $filename = $invoice->getId().'.pdf';

        if ($this->invoicesFs->has($filename)) {
            $this->invoicesFs->delete($filename);
        }

        $html = $this->twig->render(
            'invoice/invoice.html.twig',
            [
                'invoice' => $invoice,
                'customer' => $this->addressRepository
                    ->findOneByInvoiceAndType(
                        $invoice,
                        InvoiceAddress::TYPE_CUSTOMER
                    ),
                'issuer' => $this->addressRepository
                    ->findOneByInvoiceAndType(
                        $invoice,
                        InvoiceAddress::TYPE_ISSUER
                    ),
                'vatSummary' => $this->itemRepository
                    ->getVatSummaryByInvoice($invoice),
            ]
        );

        ob_start();
        $factory = $this->mpdfFactory;
        $mpdf = $factory();
        $mpdf->WriteHTML($html);
        $mpdf->Output();

        $this->invoicesFs->write($filename, ob_get_clean());

        $invoice->setFileName($filename);

        $this->em->persist($invoice);
        $this->em->flush();
    }
}
