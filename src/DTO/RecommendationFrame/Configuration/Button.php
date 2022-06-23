<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Class Button
 *
 * @package Cyberkonsultant
 */
class Button
{
    protected $width;
    protected $height;
    protected $position;
    protected $backgroundColor;
    protected $borderColor;
    protected $textColor;
    protected $textSize;
    protected $borderRadius;
    protected $sidePadding;
    protected $text;

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width): void
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height): void
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position): void
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * @param mixed $backgroundColor
     */
    public function setBackgroundColor($backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return mixed
     */
    public function getBorderColor()
    {
        return $this->borderColor;
    }

    /**
     * @param mixed $borderColor
     */
    public function setBorderColor($borderColor): void
    {
        $this->borderColor = $borderColor;
    }

    /**
     * @return mixed
     */
    public function getTextColor()
    {
        return $this->textColor;
    }

    /**
     * @param mixed $textColor
     */
    public function setTextColor($textColor): void
    {
        $this->textColor = $textColor;
    }

    /**
     * @return mixed
     */
    public function getTextSize()
    {
        return $this->textSize;
    }

    /**
     * @param mixed $textSize
     */
    public function setTextSize($textSize): void
    {
        $this->textSize = $textSize;
    }

    /**
     * @return mixed
     */
    public function getBorderRadius()
    {
        return $this->borderRadius;
    }

    /**
     * @param mixed $borderRadius
     */
    public function setBorderRadius($borderRadius): void
    {
        $this->borderRadius = $borderRadius;
    }

    /**
     * @return mixed
     */
    public function getSidePadding()
    {
        return $this->sidePadding;
    }

    /**
     * @param mixed $sidePadding
     */
    public function setSidePadding($sidePadding): void
    {
        $this->sidePadding = $sidePadding;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }
}