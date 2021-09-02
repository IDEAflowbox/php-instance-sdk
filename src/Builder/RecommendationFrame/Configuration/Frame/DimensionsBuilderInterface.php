<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Dimensions;

interface DimensionsBuilderInterface
{
    public function setWidth(string $width): DimensionsBuilderInterface;
    public function setHeight(string $height): DimensionsBuilderInterface;
    public function setMarginTop(string $marginTop): DimensionsBuilderInterface;
    public function setMarginBottom(string $marginBottom): DimensionsBuilderInterface;
    public function setMarginSide(string $marginSide): DimensionsBuilderInterface;
    public function setSpaceBetweenElements(string $spaceBetweenElements): DimensionsBuilderInterface;
    public function getResult(): Dimensions;
    public function endDimensionsBuilder(): FrameBuilderInterface;
}