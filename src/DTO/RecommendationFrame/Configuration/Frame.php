<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Class Frame
 *
 * @package Cyberkonsultant
 */
class Frame
{
    /**
     * @var string
     */
    protected $sidePadding;

    /**
     * @var string
     */
    protected $marginBottom;

    /**
     * @var string
     */
    protected $marginBetween;

    /**
     * @return string
     */
    public function getSidePadding(): string
    {
        return $this->sidePadding;
    }

    /**
     * @param string $sidePadding
     */
    public function setSidePadding(string $sidePadding): void
    {
        $this->sidePadding = $sidePadding;
    }

    /**
     * @return string
     */
    public function getMarginBottom(): string
    {
        return $this->marginBottom;
    }

    /**
     * @param string $marginBottom
     */
    public function setMarginBottom(string $marginBottom): void
    {
        $this->marginBottom = $marginBottom;
    }

    /**
     * @return string
     */
    public function getMarginBetween(): string
    {
        return $this->marginBetween;
    }

    /**
     * @param string $marginBetween
     */
    public function setMarginBetween(string $marginBetween): void
    {
        $this->marginBetween = $marginBetween;
    }
}