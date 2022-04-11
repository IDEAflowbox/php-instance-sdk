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

    /**
     * @param string $width
     */
    public function setWidth(string $width): void
    {
        $this->width = $width;
    }

    /**
     * @param string $height
     */
    public function setHeight(string $height): void
    {
        $this->height = $height;
    }

    /**
     * @param string $marginTop
     */
    public function setMarginTop(string $marginTop): void
    {
        $this->marginTop = $marginTop;
    }

    /**
     * @param string $marginBottom
     */
    public function setMarginBottom(string $marginBottom): void
    {
        $this->marginBottom = $marginBottom;
    }

    /**
     * @param string $marginSide
     */
    public function setMarginSide(string $marginSide): void
    {
        $this->marginSide = $marginSide;
    }

    /**
     * @param string $spaceBetweenElements
     */
    public function setSpaceBetweenElements(string $spaceBetweenElements): void
    {
        $this->spaceBetweenElements = $spaceBetweenElements;
    }
}