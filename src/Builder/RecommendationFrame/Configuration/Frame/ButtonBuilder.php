<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\Button\DimensionsBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Button;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\Button\DimensionsBuilderInterface;

/**
 * Class ButtonBuilder
 *
 * @package Cyberkonsultant
 */
class ButtonBuilder implements ButtonBuilderInterface
{
    /**
     * @var DimensionsBuilderInterface
     */
    protected $dimensionsBuilder;

    /**
     * @var string
     */
    protected $borderRadius;

    /**
     * @var string
     */
    protected $position;

    /**
     * @var string
     */
    protected $backgroundColor;

    /**
     * @var string
     */
    protected $textColor;

    /**
     * @var FrameBuilderInterface
     */
    protected $parent;

    /**
     * ButtonBuilder constructor.
     * @param FrameBuilderInterface $parent
     */
    public function __construct(FrameBuilderInterface $parent)
    {
        $this->parent = $parent;
        $this->dimensionsBuilder = new DimensionsBuilder($this);
    }

    /**
     * @return DimensionsBuilderInterface
     */
    public function getDimensionsBuilder(): DimensionsBuilderInterface
    {
        return $this->dimensionsBuilder;
    }

    /**
     * @param string $borderRadius
     * @return ButtonBuilderInterface
     */
    public function setBorderRadius(string $borderRadius): ButtonBuilderInterface
    {
        $this->borderRadius = $borderRadius;
        return $this;
    }

    /**
     * @param string $position
     * @return ButtonBuilderInterface
     */
    public function setPosition(string $position): ButtonBuilderInterface
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @param string $backgroundColor
     * @return ButtonBuilderInterface
     */
    public function setBackgroundColor(string $backgroundColor): ButtonBuilderInterface
    {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    /**
     * @param string $textColor
     * @return ButtonBuilderInterface
     */
    public function setTextColor(string $textColor): ButtonBuilderInterface
    {
        $this->textColor = $textColor;
        return $this;
    }

    /**
     * @return Button
     */
    public function getResult(): Button
    {
        $button = new Button();
        $button->setDimensions($this->getDimensionsBuilder()->getResult());
        $button->setBorderRadius($this->borderRadius);
        $button->setPosition($this->position);
        $button->setBackgroundColor($this->backgroundColor);
        $button->setTextColor($this->textColor);
        return $button;
    }

    /**
     * @return FrameBuilderInterface
     */
    public function endButtonBuilder(): FrameBuilderInterface
    {
        return $this->parent;
    }
}