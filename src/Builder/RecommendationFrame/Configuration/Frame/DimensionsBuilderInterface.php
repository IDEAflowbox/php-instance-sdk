<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Dimensions;

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
     * @param string $marginTop
     * @return DimensionsBuilderInterface
     */
    public function setMarginTop(string $marginTop): DimensionsBuilderInterface;

    /**
     * @param string $marginBottom
     * @return DimensionsBuilderInterface
     */
    public function setMarginBottom(string $marginBottom): DimensionsBuilderInterface;

    /**
     * @param string $marginSide
     * @return DimensionsBuilderInterface
     */
    public function setMarginSide(string $marginSide): DimensionsBuilderInterface;

    /**
     * @param string $spaceBetweenElements
     * @return DimensionsBuilderInterface
     */
    public function setSpaceBetweenElements(string $spaceBetweenElements): DimensionsBuilderInterface;

    /**
     * @return Dimensions
     */
    public function getResult(): Dimensions;

    /**
     * @return FrameBuilderInterface
     */
    public function endDimensionsBuilder(): FrameBuilderInterface;
}