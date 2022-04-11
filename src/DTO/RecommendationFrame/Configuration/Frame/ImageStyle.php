<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame;

/**
 * Class ImageStyle
 *
 * @package Cyberkonsultant
 */
class ImageStyle
{
    /**
     * @var string
     */
    protected $height;

    /**
     * @var string
     */
    protected $backgroundColor;

    /**
     * @return string
     */
    public function getHeight(): string
    {
        return $this->height;
    }

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string $height
     */
    public function setHeight(string $height): void
    {
        $this->height = $height;
    }

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }
}