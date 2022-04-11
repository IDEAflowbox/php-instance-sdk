<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame;

/**
 * Class Style
 *
 * @package Cyberkonsultant
 */
class Style
{
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
    protected $borderColorOnHover;

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    /**
     * @return string
     */
    public function getBorderColor(): string
    {
        return $this->borderColor;
    }

    /**
     * @return string
     */
    public function getBorderColorOnHover(): string
    {
        return $this->borderColorOnHover;
    }

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @param string $borderColor
     */
    public function setBorderColor(string $borderColor): void
    {
        $this->borderColor = $borderColor;
    }

    /**
     * @param string $borderColorOnHover
     */
    public function setBorderColorOnHover(string $borderColorOnHover): void
    {
        $this->borderColorOnHover = $borderColorOnHover;
    }
}