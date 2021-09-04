<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\DimensionsBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\StyleBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\ImageStyleBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\ButtonBuilderInterface;

/**
 * Interface FrameBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface FrameBuilderInterface
{
    /**
     * @param int $borderRadius
     * @return FrameBuilderInterface
     */
    public function setBorderRadius(int $borderRadius): FrameBuilderInterface;

    /**
     * @return DimensionsBuilderInterface
     */
    public function getDimensionsBuilder(): DimensionsBuilderInterface;

    /**
     * @return StyleBuilderInterface
     */
    public function getStyleBuilder(): StyleBuilderInterface;

    /**
     * @return ImageStyleBuilderInterface
     */
    public function getImageStyleBuilder(): ImageStyleBuilderInterface;

    /**
     * @return ButtonBuilderInterface
     */
    public function getButtonBuilder(): ButtonBuilderInterface;

    /**
     * @return Frame
     */
    public function getResult(): Frame;

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endFrameBuilder(): ConfigurationBuilderInterface;
}