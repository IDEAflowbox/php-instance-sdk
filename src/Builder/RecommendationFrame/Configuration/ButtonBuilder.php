<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Button;

/**
 * Class ButtonBuilder
 *
 * @package Cyberkonsultant
 */
class ButtonBuilder implements ButtonBuilderInterface
{
    /**
     * @var string
     */
    protected $width;

    /**
     * @var string
     */
    protected $height;

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
    protected $borderColor;

    /**
     * @var string
     */
    protected $textColor;

    /**
     * @var string
     */
    protected $textSize;

    /**
     * @var string
     */
    protected $borderRadius;

    /**
     * @var string
     */
    protected $sidePadding;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var ConfigurationBuilderInterface
     */
    protected $parent;

    public function __construct(ConfigurationBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    public function setWidth(string $width): ButtonBuilderInterface
    {
        $this->width = $width;
        return $this;
    }

    public function setHeight(string $height): ButtonBuilderInterface
    {
        $this->height = $height;
        return $this;
    }

    public function setPosition(string $position): ButtonBuilderInterface
    {
        $this->position = $position;
        return $this;
    }

    public function setBackgroundColor(string $backgroundColor): ButtonBuilderInterface
    {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    public function setBorderColor(string $borderColor): ButtonBuilderInterface
    {
        $this->borderColor = $borderColor;
        return $this;
    }

    public function setTextColor(string $textColor): ButtonBuilderInterface
    {
        $this->textColor = $textColor;
        return $this;
    }

    public function setTextSize(string $textSize): ButtonBuilderInterface
    {
        $this->textSize = $textSize;
        return $this;
    }

    public function setBorderRadius(string $borderRadius): ButtonBuilderInterface
    {
        $this->borderRadius = $borderRadius;
        return $this;
    }

    public function setSidePadding(string $sidePadding): ButtonBuilderInterface
    {
        $this->sidePadding = $sidePadding;
        return $this;
    }

    public function setText(string $text): ButtonBuilderInterface
    {
        $this->text = $text;
        return $this;
    }

    public function getResult(): Button
    {
        $button = new Button();
        $button->setWidth($this->width);
        $button->setHeight($this->height);
        $button->setPosition($this->position);
        $button->setBackgroundColor($this->backgroundColor);
        $button->setBorderColor($this->borderColor);
        $button->setTextColor($this->textColor);
        $button->setTextSize($this->textSize);
        $button->setBorderRadius($this->borderRadius);
        $button->setSidePadding($this->sidePadding);
        $button->setText($this->text);
        return $button;
    }

    public function endButtonBuilder(): ConfigurationBuilderInterface
    {
        return $this->parent;
    }
}