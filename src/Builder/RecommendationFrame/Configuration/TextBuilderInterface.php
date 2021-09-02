<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Text;

interface TextBuilderInterface
{
    public function setProductContents(string $productContents): TextBuilderInterface;
    public function setButton(string $button): TextBuilderInterface;
    public function getResult(): Text;
    public function endTextBuilder(): ConfigurationBuilderInterface;
}