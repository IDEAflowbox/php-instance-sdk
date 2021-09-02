<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Class Navigation
 *
 * @package Cyberkonsultant
 */
class Navigation
{
    /**
     * @var string
     */
    protected $size;

    /**
     * @var string
     */
    protected $style;

    /**
     * @var string
     */
    protected $color;

    /**
     * Navigation constructor.
     * @param string $size
     * @param string $style
     * @param string $color
     */
    public function __construct(string $size, string $style, string $color)
    {
        $this->size = $size;
        $this->style = $style;
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getStyle(): string
    {
        return $this->style;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }
}