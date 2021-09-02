<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame;

/**
 * Class Dimensions
 *
 * @package Cyberkonsultant
 */
class Dimensions
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
     * Dimensions constructor.
     * @param string $width
     * @param string $height
     * @param string $marginTop
     * @param string $marginBottom
     * @param string $marginSide
     * @param string $spaceBetweenElements
     */
    public function __construct(
        string $width,
        string $height,
        string $marginTop,
        string $marginBottom,
        string $marginSide,
        string $spaceBetweenElements
    ) {
        $this->width = $width;
        $this->height = $height;
        $this->marginTop = $marginTop;
        $this->marginBottom = $marginBottom;
        $this->marginSide = $marginSide;
        $this->spaceBetweenElements = $spaceBetweenElements;
    }

    /**
     * @return string
     */
    public function getWidth(): string
    {
        return $this->width;
    }

    /**
     * @return string
     */
    public function getHeight(): string
    {
        return $this->height;
    }

    /**
     * @return string
     */
    public function getMarginTop(): string
    {
        return $this->marginTop;
    }

    /**
     * @return string
     */
    public function getMarginBottom(): string
    {
        return $this->marginBottom;
    }

    /**
     * @return string
     */
    public function getMarginSide(): string
    {
        return $this->marginSide;
    }

    /**
     * @return string
     */
    public function getSpaceBetweenElements(): string
    {
        return $this->spaceBetweenElements;
    }
}