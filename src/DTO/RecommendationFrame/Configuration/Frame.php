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
     * @var string|null
     */
    protected $wrapperStyles = null;

    /**
     * @var string|null
     */
    protected $titleText = null;

    /**
     * @var string|null
     */
    protected $titleWrapperStyles = null;

    /**
     * @var string|null
     */
    protected $titleStyles = null;

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

    /**
     * @return string|null
     */
    public function getWrapperStyles(): ?string
    {
        return $this->wrapperStyles;
    }

    /**
     * @param string|null $wrapperStyles
     */
    public function setWrapperStyles(?string $wrapperStyles): void
    {
        $this->wrapperStyles = $wrapperStyles;
    }

    /**
     * @return string|null
     */
    public function getTitleText(): ?string
    {
        return $this->titleText;
    }

    /**
     * @param string|null $titleText
     */
    public function setTitleText(?string $titleText): void
    {
        $this->titleText = $titleText;
    }

    /**
     * @return string|null
     */
    public function getTitleWrapperStyles(): ?string
    {
        return $this->titleWrapperStyles;
    }

    /**
     * @param string|null $titleWrapperStyles
     */
    public function setTitleWrapperStyles(?string $titleWrapperStyles): void
    {
        $this->titleWrapperStyles = $titleWrapperStyles;
    }

    /**
     * @return string|null
     */
    public function getTitleStyles(): ?string
    {
        return $this->titleStyles;
    }

    /**
     * @param string|null $titleStyles
     */
    public function setTitleStyles(?string $titleStyles): void
    {
        $this->titleStyles = $titleStyles;
    }
}