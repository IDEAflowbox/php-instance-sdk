<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Class EnabledElements
 *
 * @package Cyberkonsultant
 */
class Animations
{
    /**
     * @var bool
     */
    protected $shadow;

    /**
     * @var bool
     */
    protected $scaleUp;

    /**
     * @var bool
     */
    protected $overlay;

    /**
     * @return bool
     */
    public function isShadow(): bool
    {
        return $this->shadow;
    }

    /**
     * @param bool $shadow
     */
    public function setShadow(bool $shadow): void
    {
        $this->shadow = $shadow;
    }

    /**
     * @return bool
     */
    public function isScaleUp(): bool
    {
        return $this->scaleUp;
    }

    /**
     * @param bool $scaleUp
     */
    public function setScaleUp(bool $scaleUp): void
    {
        $this->scaleUp = $scaleUp;
    }

    /**
     * @return bool
     */
    public function isOverlay(): bool
    {
        return $this->overlay;
    }

    /**
     * @param bool $overlay
     */
    public function setOverlay(bool $overlay): void
    {
        $this->overlay = $overlay;
    }
}