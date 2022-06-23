<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Animations;

/**
 * Class AnimationsBuilder
 *
 * @package Cyberkonsultant
 */
class AnimationsBuilder implements AnimationsBuilderInterface
{
    /**
     * @var bool
     */
    protected $shadow = false;

    /**
     * @var bool
     */
    protected $scaleUp = false;

    /**
     * @var bool
     */
    protected $overlay = false;

    /**
     * @var ConfigurationBuilderInterface
     */
    protected $parent;

    public function __construct(ConfigurationBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    public function setShadow(bool $shadow): AnimationsBuilderInterface
    {
        $this->shadow = $shadow;
        return $this;
    }

    public function setScaleUp(bool $scaleUp): AnimationsBuilderInterface
    {
        $this->scaleUp = $scaleUp;
        return $this;
    }

    public function setOverlay(bool $overlay): AnimationsBuilderInterface
    {
        $this->overlay = $overlay;
        return $this;
    }

    public function endAnimationsBuilder(): ConfigurationBuilderInterface
    {
        return $this->parent;
    }

    public function getResult(): Animations
    {
        $animations = new Animations();
        $animations->setShadow($this->shadow);
        $animations->setScaleUp($this->scaleUp);
        $animations->setOverlay($this->overlay);
        return $animations;
    }
}