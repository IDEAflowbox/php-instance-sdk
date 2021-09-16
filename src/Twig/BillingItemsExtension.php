<?php

namespace App\Twig;

use App\Entity\BillingItem;
use App\Entity\Client;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class BillingItemsExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('billing_items_net_value', [$this, 'netValue']),
            new TwigFilter('billing_items_vat_value', [$this, 'vatValue']),
            new TwigFilter('billing_items_gross_value', [$this, 'grossValue']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('billing_items_net_value', [$this, 'netValue']),
            new TwigFunction('billing_items_vat_value', [$this, 'vatValue']),
            new TwigFunction('billing_items_gross_value', [$this, 'grossValue']),
        ];
    }

    public function netValue(Client $client): string
    {
        return $this->reduce(
            $client,
            function (int $amount, BillingItem $item) {
                return $amount + ($item->getQuantity() * $item->getUnitPrice());
            }
        );
    }

    public function vatValue(Client $client): string
    {
        return $this->reduce(
            $client,
            function (float $amount, BillingItem $item) {
                return $amount + ($item->getQuantity() * $item->getUnitPrice() * $item->getVatRate() / 100);
            }
        );
    }

    public function grossValue(Client $client): string
    {
        return $this->reduce(
            $client,
            function (int $amount, BillingItem $item) {
                return $amount + ($item->getQuantity() * $item->getUnitPrice() * (($item->getVatRate() / 100) + 1));
            }
        );
    }

    private function reduce(Client $client, callable $function): string
    {
        $value = array_reduce(
            iterator_to_array($client->getBillingItems()),
            $function,
            0
        );

        return number_format(
            $value / 100, 2,
            ',',
            ' '
        );
    }
}
