<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Class Product
 *
 * @package Cyberkonsultant
 */
class Product
{
    /**
     * @var string
     */
    protected $sidePadding;

    /**
     * @var string
     */
    protected $paddingTop;

    /**
     * @var string
     */
    protected $paddingBottom;

    /**
     * @var string
     */
    protected $borderRadius;

    /**
     * @var string
     */
    protected $backgroundColor;

    /**
     * @return string
     */
    public function getSidePadding(): string
    {
        return $this->sidePadding;
    }

    /**
     * @param string $sidePadding
     */
    public function setSidePadding(string $sidePadding): void
    {
        $this->sidePadding = $sidePadding;
    }

    /**
     * @return string
     */
    public function getPaddingTop(): string
    {
        return $this->paddingTop;
    }

    /**
     * @param string $paddingTop
     */
    public function setPaddingTop(string $paddingTop): void
    {
        $this->paddingTop = $paddingTop;
    }

    /**
     * @return string
     */
    public function getPaddingBottom(): string
    {
        return $this->paddingBottom;
    }

    /**
     * @param string $paddingBottom
     */
    public function setPaddingBottom(string $paddingBottom): void
    {
        $this->paddingBottom = $paddingBottom;
    }

    /**
     * @return string
     */
    public function getBorderRadius(): string
    {
        return $this->borderRadius;
    }

    /**
     * @param string $borderRadius
     */
    public function setBorderRadius(string $borderRadius): void
    {
        $this->borderRadius = $borderRadius;
    }

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }
}