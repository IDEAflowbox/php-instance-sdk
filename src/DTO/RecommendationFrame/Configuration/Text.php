<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Class Text
 *
 * @package Cyberkonsultant
 */
class Text
{
    /**
     * @var string
     */
    protected $productContents;

    /**
     * @var string
     */
    protected $button;

    /**
     * Text constructor.
     * @param string $productContents
     * @param string $button
     */
    public function __construct(string $productContents, string $button)
    {
        $this->productContents = $productContents;
        $this->button = $button;
    }

    /**
     * @return string
     */
    public function getProductContents(): string
    {
        return $this->productContents;
    }

    /**
     * @return string
     */
    public function getButton(): string
    {
        return $this->button;
    }

    /**
     * @param string $productContents
     */
    public function setProductContents(string $productContents): void
    {
        $this->productContents = $productContents;
    }

    /**
     * @param string $button
     */
    public function setButton(string $button): void
    {
        $this->button = $button;
    }
}