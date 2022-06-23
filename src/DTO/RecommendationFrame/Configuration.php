<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Animations;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Arrow;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Button;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Image;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Matrix;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\EnabledElements;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Product;

/**
 * Class Configuration
 *
 * @package Cyberkonsultant
 */
class Configuration
{
    /**
     * @var Matrix|null
     */
    protected $matrix = null;

    /**
     * @var EnabledElements|null
     */
    protected $enabledElements = null;

    /**
     * @var Image|null
     */
    protected $image = null;

    /**
     * @var Frame|null
     */
    protected $frame = null;

    /**
     * @var Product|null
     */
    protected $product = null;

    /**
     * @var Arrow|null
     */
    protected $arrow = null;
    /**
     * @var Button|null
     */
    protected $button = null;

    /**
     * @var Animations|null
     */
    protected $animations = null;

    /**
     * @return Matrix|null
     */
    public function getMatrix(): ?Matrix
    {
        return $this->matrix;
    }

    /**
     * @param Matrix|null $matrix
     */
    public function setMatrix(?Matrix $matrix): void
    {
        $this->matrix = $matrix;
    }

    /**
     * @return EnabledElements|null
     */
    public function getEnabledElements(): ?EnabledElements
    {
        return $this->enabledElements;
    }

    /**
     * @param EnabledElements|null $enabledElements
     */
    public function setEnabledElements(?EnabledElements $enabledElements): void
    {
        $this->enabledElements = $enabledElements;
    }

    /**
     * @return Image|null
     */
    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @param Image|null $image
     */
    public function setImage(?Image $image): void
    {
        $this->image = $image;
    }

    /**
     * @return Frame|null
     */
    public function getFrame(): ?Frame
    {
        return $this->frame;
    }

    /**
     * @param Frame|null $frame
     */
    public function setFrame(?Frame $frame): void
    {
        $this->frame = $frame;
    }

    /**
     * @return Arrow|null
     */
    public function getArrow(): ?Arrow
    {
        return $this->arrow;
    }

    /**
     * @param Arrow|null $arrow
     */
    public function setArrow(?Arrow $arrow): void
    {
        $this->arrow = $arrow;
    }

    /**
     * @return Button|null
     */
    public function getButton(): ?Button
    {
        return $this->button;
    }

    /**
     * @param Button|null $button
     */
    public function setButton(?Button $button): void
    {
        $this->button = $button;
    }

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     */
    public function setProduct(?Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return Animations|null
     */
    public function getAnimations(): ?Animations
    {
        return $this->animations;
    }

    /**
     * @param Animations|null $animations
     */
    public function setAnimations(?Animations $animations): void
    {
        $this->animations = $animations;
    }
}