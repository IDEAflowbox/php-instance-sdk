<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Navigation;

/**
 * Interface NavigationBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface NavigationBuilderInterface
{
    /**
     * @param string $size
     * @return NavigationBuilderInterface
     */
    public function setSize(string $size): NavigationBuilderInterface;

    /**
     * @param string $style
     * @return NavigationBuilderInterface
     */
    public function setStyle(string $style): NavigationBuilderInterface;

    /**
     * @param string $color
     * @return NavigationBuilderInterface
     */
    public function setColor(string $color): NavigationBuilderInterface;

    /**
     * @return Navigation
     */
    public function getResult(): Navigation;

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endNavigationBuilder(): ConfigurationBuilderInterface;
}