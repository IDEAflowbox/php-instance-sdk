<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Button;

/**
 * Class Dimensions
 *
 * @package Cyberkonsultant
 */
class Dimensions
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
     * @return string
     */
    public function getWidth(): string
    {
        return $this->width;
    }

    /**
     * @return string
     */
    public function getHeight(): string
    {
        return $this->height;
    }

    /**
     * @param string $width
     */
    public function setWidth(string $width): void
    {
        $this->width = $width;
    }

    /**
     * @param string $height
     */
    public function setHeight(string $height): void
    {
        $this->height = $height;
    }
}