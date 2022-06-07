<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame;

/**
 * Class RenderSettings
 *
 * @package Cyberkonsultant
 */
class RenderSettings
{
    /**
     * @var string
     */
    protected $xpath;

    /**
     * @var string
     */
    protected $xpathInjectionPosition;

    /**
     * @var string|null
     */
    protected $filter;

    /**
     * @return string
     */
    public function getXpath(): string
    {
        return $this->xpath;
    }

    /**
     * @param string $xpath
     */
    public function setXpath(string $xpath): void
    {
        $this->xpath = $xpath;
    }

    /**
     * @return string
     */
    public function getXpathInjectionPosition(): string
    {
        return $this->xpathInjectionPosition;
    }

    /**
     * @param string $xpathInjectionPosition
     */
    public function setXpathInjectionPosition(string $xpathInjectionPosition): void
    {
        $this->xpathInjectionPosition = $xpathInjectionPosition;
    }

    /**
     * @return string|null
     */
    public function getFilter(): ?string
    {
        return $this->filter;
    }

    /**
     * @param string|null $filter
     */
    public function setFilter(?string $filter): void
    {
        $this->filter = $filter;
    }
}