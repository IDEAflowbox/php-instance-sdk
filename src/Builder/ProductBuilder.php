<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Category;
use Cyberkonsultant\DTO\Product;

/**
 * Class ProductBuilder
 * @package Cyberkonsultant\Builder
 */
class ProductBuilder implements ProductBuilderInterface
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $image;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var float
     */
    protected $netPrice;

    /**
     * @var float
     */
    protected $grossPrice;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var Category[]
     */
    protected $categories = [];

    /**
     * @param string $code
     * @return ProductBuilderInterface
     */
    public function setCode(string $code): ProductBuilderInterface
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param string $name
     * @return ProductBuilderInterface
     */
    public function setName(string $name): ProductBuilderInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $image
     * @return ProductBuilderInterface
     */
    public function setImage(string $image): ProductBuilderInterface
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @param string $description
     * @return ProductBuilderInterface
     */
    public function setDescription(string $description): ProductBuilderInterface
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param float $netPrice
     * @return ProductBuilderInterface
     */
    public function setNetPrice(float $netPrice): ProductBuilderInterface
    {
        $this->netPrice = $netPrice;
        return $this;
    }

    /**
     * @param float $grossPrice
     * @return ProductBuilderInterface
     */
    public function setGrossPrice(float $grossPrice): ProductBuilderInterface
    {
        $this->grossPrice = $grossPrice;
        return $this;
    }

    /**
     * @param string $url
     * @return ProductBuilderInterface
     */
    public function setUrl(string $url): ProductBuilderInterface
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param string $realId
     * @return ProductBuilderInterface
     */
    public function addCategory(string $realId): ProductBuilderInterface
    {
        $this->categories[] = new Category(
            null,
            $realId,
            null,
            null,
            null
        );
        return $this;
    }

    /**
     * @return Product
     */
    public function getResult(): Product
    {
        return new Product(
            null,
            $this->code,
            $this->name,
            $this->image,
            $this->description,
            $this->netPrice,
            $this->grossPrice,
            $this->url,
            $this->categories
        );
    }
}