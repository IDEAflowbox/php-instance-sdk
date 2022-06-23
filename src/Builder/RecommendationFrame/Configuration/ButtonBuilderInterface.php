<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Button;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\EnabledElements;

/**
 * Interface ButtonBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface ButtonBuilderInterface
{
    /**
     * @param string $width
     * @return ButtonBuilderInterface
     */
    public function setWidth(string $width): ButtonBuilderInterface;

    /**
     * @param string $height
     * @return ButtonBuilderInterface
     */
    public function setHeight(string $height): ButtonBuilderInterface;

    /**
     * @param string $position
     * @return ButtonBuilderInterface
     */
    public function setPosition(string $position): ButtonBuilderInterface;

    /**
     * @param string $backgroundColor
     * @return ButtonBuilderInterface
     */
    public function setBackgroundColor(string $backgroundColor): ButtonBuilderInterface;

    /**
     * @param string $borderColor
     * @return ButtonBuilderInterface
     */
    public function setBorderColor(string $borderColor): ButtonBuilderInterface;

    /**
     * @param string $textColor
     * @return ButtonBuilderInterface
     */
    public function setTextColor(string $textColor): ButtonBuilderInterface;

    /**
     * @param string $textSize
     * @return ButtonBuilderInterface
     */
    public function setTextSize(string $textSize): ButtonBuilderInterface;

    /**
     * @param string $borderRadius
     * @return ButtonBuilderInterface
     */
    public function setBorderRadius(string $borderRadius): ButtonBuilderInterface;

    /**
     * @param string $sidePadding
     * @return ButtonBuilderInterface
     */
    public function setSidePadding(string $sidePadding): ButtonBuilderInterface;

    /**
     * @param string $text
     * @return ButtonBuilderInterface
     */
    public function setText(string $text): ButtonBuilderInterface;

    /**
     * @return Button
     */
    public function getResult(): Button;

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endButtonBuilder(): ConfigurationBuilderInterface;
}