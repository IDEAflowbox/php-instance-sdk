<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\Button;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\ButtonBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Button\Dimensions;

/**
 * Interface DimensionsBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface DimensionsBuilderInterface
{
    /**
     * @param string $width
     * @return DimensionsBuilderInterface
     */
    public function setWidth(string $width): DimensionsBuilderInterface;

    /**
     * @param string $height
     * @return DimensionsBuilderInterface
     */
    public function setHeight(string $height): DimensionsBuilderInterface;

    /**
     * @return Dimensions
     */
    public function getResult(): Dimensions;

    /**
     * @return ButtonBuilderInterface
     */
    public function endDimensionsBuilder(): ButtonBuilderInterface;
}