<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\ImageStyle;

/**
 * Interface ImageStyleBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface ImageStyleBuilderInterface
{
    /**
     * @param string $height
     * @return ImageStyleBuilderInterface
     */
    public function setHeight(string $height): ImageStyleBuilderInterface;

    /**
     * @param string $backgroundColor
     * @return ImageStyleBuilderInterface
     */
    public function setBackgroundColor(string $backgroundColor): ImageStyleBuilderInterface;

    /**
     * @return ImageStyle
     */
    public function getResult(): ImageStyle;

    /**
     * @return FrameBuilderInterface
     */
    public function endImageStyleBuilder(): FrameBuilderInterface;
}