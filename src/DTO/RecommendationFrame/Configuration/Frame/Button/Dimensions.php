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
     * Dimensions constructor.
     * @param string $width
     * @param string $height
     */
    public function __construct(string $width, string $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

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
}