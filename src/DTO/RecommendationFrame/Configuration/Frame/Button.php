<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Button\Dimensions;

/**
 * Class Button
 *
 * @package Cyberkonsultant
 */
class Button
{
    /**
     * @var Dimensions
     */
    protected $dimensions;

    /**
     * @var string
     */
    protected $borderRadius;

    /**
     * @var string
     */
    protected $position;

    /**
     * @var string
     */
    protected $backgroundColor;

    /**
     * @var string
     */
    protected $textColor;

    /**
     * RecommendationFrameConfigurationFrameButton constructor.
     * @param Dimensions $dimensions
     * @param string $borderRadius
     * @param string $position
     * @param string $backgroundColor
     * @param string $textColor
     */
    public function __construct(
        Dimensions $dimensions,
        string $borderRadius,
        string $position,
        string $backgroundColor,
        string $textColor
    ) {
        $this->dimensions = $dimensions;
        $this->borderRadius = $borderRadius;
        $this->position = $position;
        $this->backgroundColor = $backgroundColor;
        $this->textColor = $textColor;
    }

    /**
     * @return Dimensions
     */
    public function getDimensions(): Dimensions
    {
        return $this->dimensions;
    }

    /**
     * @return string
     */
    public function getBorderRadius(): string
    {
        return $this->borderRadius;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    /**
     * @return string
     */
    public function getTextColor(): string
    {
        return $this->textColor;
    }

    /**
     * @param Dimensions $dimensions
     */
    public function setDimensions(Dimensions $dimensions): void
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @param string $borderRadius
     */
    public function setBorderRadius(string $borderRadius): void
    {
        $this->borderRadius = $borderRadius;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @param string $textColor
     */
    public function setTextColor(string $textColor): void
    {
        $this->textColor = $textColor;
    }
}