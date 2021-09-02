<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Button;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\Button\DimensionsBuilderInterface;

/**
 * Interface ButtonBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface ButtonBuilderInterface
{
    /**
     * @return DimensionsBuilderInterface
     */
    public function getDimensionsBuilder(): DimensionsBuilderInterface;

    /**
     * @param int $borderRadius
     * @return ButtonBuilderInterface
     */
    public function setBorderRadius(int $borderRadius): ButtonBuilderInterface;

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
     * @param string $textColor
     * @return ButtonBuilderInterface
     */
    public function setTextColor(string $textColor): ButtonBuilderInterface;

    /**
     * @return Button
     */
    public function getResult(): Button;

    /**
     * @return FrameBuilderInterface
     */
    public function endButtonBuilder(): FrameBuilderInterface;
}