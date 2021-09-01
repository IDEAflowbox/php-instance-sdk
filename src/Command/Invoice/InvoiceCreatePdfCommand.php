<?php

namespace App\Command\Invoice;

use App\Entity\Invoice;
use App\Repository\InvoiceRepository;
use App\Service\Invoice\InvoicePdfGeneratorInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class InvoiceCreatePdfCommand extends Command
{
    protected static $defaultName = 'app:invoice:create-pdf';
    protected static $defaultDescription = 'Invoice create pdf';

    public function __construct(
        private InvoiceRepository $repository,
        private InvoicePdfGeneratorInterface $generator
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('invoice', InputArgument::OPTIONAL, 'Invoice id')
            ->setDescription(self::$defaultDescription)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        if (null !== $input->getArgument('invoice')) {
            $invoice = $this->repository->find($input->getArgument('invoice'));

            if (null === $invoice) {
                $io->error('Invoice not found.');

                return Command::FAILURE;
            }

            $this->generateInvoice($io, $input, $invoice);

            return Command::SUCCESS;
        }

        foreach ($this->repository->findAll() as $invoice) {
            $this->generateInvoice($io, $input, $invoice);
        }

        return Command::SUCCESS;
    }

    private function generateInvoice(SymfonyStyle $io, InputInterface $input, Invoice $invoice): void
    {
        $this->generator->create($invoice);
        $io->info(sprintf('Invoice %d created', $invoice->getNumber()));
    }
}
