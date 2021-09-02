<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame;

/**
 * Class Style
 *
 * @package Cyberkonsultant\DTO
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
     * Style constructor.
     * @param string $backgroundColor
     * @param string $borderColor
     * @param string $borderColorOnHover
     */
    public function __construct(string $backgroundColor, string $borderColor, string $borderColorOnHover)
    {
        $this->backgroundColor = $backgroundColor;
        $this->borderColor = $borderColor;
        $this->borderColorOnHover = $borderColorOnHover;
    }

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
}