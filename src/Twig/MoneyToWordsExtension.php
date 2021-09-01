<?php

namespace App\Twig;

use NumberToWords\NumberToWords;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class MoneyToWordsExtension extends AbstractExtension
{
    public function __construct(
        private NumberToWords $numberToWords
    ) {
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('money_to_words', [$this, 'moneyToWords']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('money_to_words', [$this, 'moneyToWords']),
        ];
    }

    public function moneyToWords(int $amount, string $currency = 'PLN', string $locale = 'pl'): string
    {
        $transformer = $this->numberToWords->getCurrencyTransformer($locale);

        return $transformer->toWords($amount, $currency);
    }
}
