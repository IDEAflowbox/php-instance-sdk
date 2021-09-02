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
 * @package Cyberkonsultant\DTO
 */
class Frame
{
    /**
     * @var int
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
     * @param int $borderRadius
     * @param Dimensions $dimensions
     * @param Style $style
     * @param ImageStyle $imageStyle
     * @param Button $button
     */
    public function __construct(
        int $borderRadius,
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
     * @return int
     */
    public function getBorderRadius(): int
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
}