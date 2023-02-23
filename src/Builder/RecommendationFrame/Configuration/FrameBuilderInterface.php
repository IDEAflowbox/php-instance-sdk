<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame;

/**
 * Interface FrameBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface FrameBuilderInterface
{
    /**
     * @param string $sidePadding
     * @return FrameBuilderInterface
     */
    public function setSidePadding(string $sidePadding): FrameBuilderInterface;

    /**
     * @param string $marginBottom
     * @return FrameBuilderInterface
     */
    public function setMarginBottom(string $marginBottom): FrameBuilderInterface;

    /**
     * @param string $marginBetween
     * @return FrameBuilderInterface
     */
    public function setMarginBetween(string $marginBetween): FrameBuilderInterface;

    /**
     * @param string|null $wrapperStyles
     * @return FrameBuilderInterface
     */
    public function setWrapperStyles(?string $wrapperStyles): FrameBuilderInterface;

    /**
     * @param string|null $titleText
     * @return FrameBuilderInterface
     */
    public function setTitleText(?string $titleText): FrameBuilderInterface;

    /**
     * @param string|null $titleWrapperStyles
     * @return FrameBuilderInterface
     */
    public function setTitleWrapperStyles(?string $titleWrapperStyles): FrameBuilderInterface;

    /**
     * @param string|null $titleStyles
     * @return FrameBuilderInterface
     */
    public function setTitleStyles(?string $titleStyles): FrameBuilderInterface;

    /**
     * @return Frame
     */
    public function getResult(): Frame;

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endFrameBuilder(): ConfigurationBuilderInterface;
}