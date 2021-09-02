<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\EnabledElements;

interface EnabledElementsBuilderInterface
{
    public function setThumbnail(bool $thumbnail): EnabledElementsBuilderInterface;
    public function setButton(bool $button): EnabledElementsBuilderInterface;
    public function setContents(bool $contents): EnabledElementsBuilderInterface;
    public function getResult(): EnabledElements;
    public function endEnabledElementsBuilder(): ConfigurationBuilderInterface;
}