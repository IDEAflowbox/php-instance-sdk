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
     * @var int
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
     * @param int $borderRadius
     * @param string $position
     * @param string $backgroundColor
     * @param string $textColor
     */
    public function __construct(
        Dimensions $dimensions,
        int $borderRadius,
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
     * @return int
     */
    public function getBorderRadius(): int
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
}