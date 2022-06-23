<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Animations;

/**
 * Interface AnimationsBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface AnimationsBuilderInterface
{
    /**
     * @param bool $shadow
     * @return AnimationsBuilderInterface
     */
    public function setShadow(bool $shadow): AnimationsBuilderInterface;

    /**
     * @param bool $scaleUp
     * @return AnimationsBuilderInterface
     */
    public function setScaleUp(bool $scaleUp): AnimationsBuilderInterface;

    /**
     * @param bool $overlay
     * @return AnimationsBuilderInterface
     */
    public function setOverlay(bool $overlay): AnimationsBuilderInterface;

    /**
     * @return Animations
     */
    public function getResult(): Animations;

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endAnimationsBuilder(): ConfigurationBuilderInterface;
}