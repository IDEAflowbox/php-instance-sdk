<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Arrow;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\EnabledElements;

/**
 * Interface ArrowBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface ArrowBuilderInterface
{
    /**
     * @param string $size
     * @return ArrowBuilderInterface
     */
    public function setSize(string $size): ArrowBuilderInterface;

    /**
     * @param string $style
     * @return ArrowBuilderInterface
     */
    public function setStyle(string $style): ArrowBuilderInterface;

    /**
     * @param string $color
     * @return ArrowBuilderInterface
     */
    public function setColor(string $color): ArrowBuilderInterface;

    /**
     * @return Arrow
     */
    public function getResult(): Arrow;

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endArrowBuilder(): ConfigurationBuilderInterface;
}