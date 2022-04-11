<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Dimensions;

/**
 * Class DimensionsBuilder
 *
 * @package Cyberkonsultant
 */
class DimensionsBuilder implements DimensionsBuilderInterface
{
    /**
     * @var string
     */
    protected $width;

    /**
     * @var string
     */
    protected $height;

    /**
     * @var string
     */
    protected $marginTop;

    /**
     * @var string
     */
    protected $marginBottom;

    /**
     * @var string
     */
    protected $marginSide;

    /**
     * @var string
     */
    protected $spaceBetweenElements;

    /**
     * @var FrameBuilderInterface
     */
    protected $parent;

    /**
     * DimensionsBuilder constructor.
     * @param FrameBuilderInterface $parent
     */
    public function __construct(FrameBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @param string $width
     * @return DimensionsBuilderInterface
     */
    public function setWidth(string $width): DimensionsBuilderInterface
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param string $height
     * @return DimensionsBuilderInterface
     */
    public function setHeight(string $height): DimensionsBuilderInterface
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param string $marginTop
     * @return DimensionsBuilderInterface
     */
    public function setMarginTop(string $marginTop): DimensionsBuilderInterface
    {
        $this->marginTop = $marginTop;
        return $this;
    }

    /**
     * @param string $marginBottom
     * @return DimensionsBuilderInterface
     */
    public function setMarginBottom(string $marginBottom): DimensionsBuilderInterface
    {
        $this->marginBottom = $marginBottom;
        return $this;
    }

    /**
     * @param string $marginSide
     * @return DimensionsBuilderInterface
     */
    public function setMarginSide(string $marginSide): DimensionsBuilderInterface
    {
        $this->marginSide = $marginSide;
        return $this;
    }

    /**
     * @param string $spaceBetweenElements
     * @return DimensionsBuilderInterface
     */
    public function setSpaceBetweenElements(string $spaceBetweenElements): DimensionsBuilderInterface
    {
        $this->spaceBetweenElements = $spaceBetweenElements;
        return $this;
    }

    /**
     * @return Dimensions
     */
    public function getResult(): Dimensions
    {
        $dimensions = new Dimensions();
        $dimensions->setWidth($this->width);
        $dimensions->setHeight($this->height);
        $dimensions->setMarginTop($this->marginTop);
        $dimensions->setMarginBottom($this->marginBottom);
        $dimensions->setMarginSide($this->marginSide);
        $dimensions->setSpaceBetweenElements($this->spaceBetweenElements);
        return $dimensions;
    }

    /**
     * @return FrameBuilderInterface
     */
    public function endDimensionsBuilder(): FrameBuilderInterface
    {
        return $this->parent;
    }
}