<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class PriceFormatExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('price_format', [$this, 'priceFormat']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('price_format', [$this, 'priceFormat']),
        ];
    }

    public function priceFormat(int $amount): string
    {
        return number_format(
            $amount / 100, 2,
            ',',
            ' '
        );
    }
}
