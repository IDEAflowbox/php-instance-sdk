<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Button;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Dimensions;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\ImageStyle;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Style;

/**
 * Class Frame
 *
 * @package Cyberkonsultant
 */
class Frame
{
    /**
     * @var string
     */
    protected $borderRadius;

    /**
     * @var Dimensions
     */
    protected $dimensions;

    /**
     * @var Style
     */
    protected $style;

    /**
     * @var ImageStyle
     */
    protected $imageStyle;

    /**
     * @var Button
     */
    protected $button;

    /**
     * RecommendationFrameConfigurationFrame constructor.
     *
     * @param string $borderRadius
     * @param Dimensions $dimensions
     * @param Style $style
     * @param ImageStyle $imageStyle
     * @param Button $button
     */
    public function __construct(
        string $borderRadius,
        Dimensions $dimensions,
        Style $style,
        ImageStyle $imageStyle,
        Button $button
    ) {
        $this->dimensions = $dimensions;
        $this->borderRadius = $borderRadius;
        $this->style = $style;
        $this->imageStyle = $imageStyle;
        $this->button = $button;
    }

    /**
     * @return string
     */
    public function getBorderRadius(): string
    {
        return $this->borderRadius;
    }

    /**
     * @return Dimensions
     */
    public function getDimensions(): Dimensions
    {
        return $this->dimensions;
    }

    /**
     * @return Style
     */
    public function getStyle(): Style
    {
        return $this->style;
    }

    /**
     * @return ImageStyle
     */
    public function getImageStyle(): ImageStyle
    {
        return $this->imageStyle;
    }

    /**
     * @return Button
     */
    public function getButton(): Button
    {
        return $this->button;
    }

    /**
     * @param string $borderRadius
     */
    public function setBorderRadius(string $borderRadius): void
    {
        $this->borderRadius = $borderRadius;
    }

    /**
     * @param Dimensions $dimensions
     */
    public function setDimensions(Dimensions $dimensions): void
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @param Style $style
     */
    public function setStyle(Style $style): void
    {
        $this->style = $style;
    }

    /**
     * @param ImageStyle $imageStyle
     */
    public function setImageStyle(ImageStyle $imageStyle): void
    {
        $this->imageStyle = $imageStyle;
    }

    /**
     * @param Button $button
     */
    public function setButton(Button $button): void
    {
        $this->button = $button;
    }
}