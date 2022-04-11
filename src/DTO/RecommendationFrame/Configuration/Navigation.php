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

    /**
     * @param string $size
     */
    public function setSize(string $size): void
    {
        $this->size = $size;
    }

    /**
     * @param string $style
     */
    public function setStyle(string $style): void
    {
        $this->style = $style;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }
}