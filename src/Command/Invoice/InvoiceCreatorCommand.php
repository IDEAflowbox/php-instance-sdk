<?php

namespace App\Command\Invoice;

use App\Message\CreateInvoice;
use App\Repository\ClientRepository;
use DateInterval;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class InvoiceCreatorCommand extends Command
{
    protected static $defaultName = 'app:invoice:creator';
    protected static $defaultDescription = 'Create invoices';

    public function __construct(
        private ClientRepository $repository,
        private MessageBusInterface $bus
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('client', InputArgument::OPTIONAL, 'Client id')
            ->setDescription(self::$defaultDescription);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if (null == $input->getArgument('client')) {
            $period = new DateInterval('P1M');
            $clients = $this->repository->findClientsWithoutInvoiceForTheBillingPeriod($period);
            foreach ($clients as $client) {
                $this->bus->dispatch(new CreateInvoice($client->getId()));
            }
        }

        if (null !== $input->getArgument('client')) {
            $client = $this->repository->find($input->getArgument('client'));
            $this->bus->dispatch(new CreateInvoice($client->getId()));
        }

        return Command::SUCCESS;
    }
}
