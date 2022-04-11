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
     * @var Dimensions|null
     */
    protected $dimensions = null;

    /**
     * @var Style|null
     */
    protected $style = null;

    /**
     * @var ImageStyle|null
     */
    protected $imageStyle = null;

    /**
     * @var Button|null
     */
    protected $button = null;

    /**
     * @return string
     */
    public function getBorderRadius(): string
    {
        return $this->borderRadius;
    }

    /**
     * @return Dimensions|null
     */
    public function getDimensions(): ?Dimensions
    {
        return $this->dimensions;
    }

    /**
     * @return Style|null
     */
    public function getStyle(): ?Style
    {
        return $this->style;
    }

    /**
     * @return ImageStyle|null
     */
    public function getImageStyle(): ?ImageStyle
    {
        return $this->imageStyle;
    }

    /**
     * @return Button|null
     */
    public function getButton(): ?Button
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