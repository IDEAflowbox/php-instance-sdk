<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Navigation;

interface NavigationBuilderInterface
{
    public function setSize(string $size): NavigationBuilderInterface;
    public function setStyle(string $style): NavigationBuilderInterface;
    public function setColor(string $color): NavigationBuilderInterface;
    public function getResult(): Navigation;
    public function endNavigationBuilder(): ConfigurationBuilderInterface;
}