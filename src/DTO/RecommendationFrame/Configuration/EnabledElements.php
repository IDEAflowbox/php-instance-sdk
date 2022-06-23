<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Class EnabledElements
 *
 * @package Cyberkonsultant
 */
class EnabledElements
{
    /**
     * @var bool
     */
    protected $image;

    /**
     * @var bool
     */
    protected $productName;

    /**
     * @var bool
     */
    protected $price;

    /**
     * @var bool
     */
    protected $button;

    /**
     * @return bool
     */
    public function isImage(): bool
    {
        return $this->image;
    }

    /**
     * @param bool $image
     */
    public function setImage(bool $image): void
    {
        $this->image = $image;
    }

    /**
     * @return bool
     */
    public function isProductName(): bool
    {
        return $this->productName;
    }

    /**
     * @param bool $productName
     */
    public function setProductName(bool $productName): void
    {
        $this->productName = $productName;
    }

    /**
     * @return bool
     */
    public function isPrice(): bool
    {
        return $this->price;
    }

    /**
     * @param bool $price
     */
    public function setPrice(bool $price): void
    {
        $this->price = $price;
    }

    /**
     * @return bool
     */
    public function isButton(): bool
    {
        return $this->button;
    }

    /**
     * @param bool $button
     */
    public function setButton(bool $button): void
    {
        $this->button = $button;
    }
}