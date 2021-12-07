<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Category;
use Cyberkonsultant\DTO\Product;
use Cyberkonsultant\DTO\ProductFeature;

/**
 * Class ProductBuilder
 *
 * @package Cyberkonsultant
 */
class ProductBuilder implements ProductBuilderInterface
{
    /**
     * @var string
     */
    protected $id;

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
     * @var float|null
     */
    protected $grossSalePrice;

    /**
     * @var int
     */
    protected $stock;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var Category[]
     */
    protected $categories = [];

    /**
     * @var ProductFeature[]
     */
    protected $features = [];

    /**
     * @param string $id
     * @return ProductBuilderInterface
     */
    public function setId(string $id): ProductBuilderInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $code
     * @return ProductBuilderInterface
     * @deprecated since version 1.2.6
     */
    public function setCode(string $code): ProductBuilderInterface
    {
        $this->id = $code;
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
     * @param float $grossSalePrice
     * @return ProductBuilderInterface
     */
    public function setGrossSalePrice(float $grossSalePrice): ProductBuilderInterface
    {
        $this->grossSalePrice = $grossSalePrice;
        return $this;
    }

    /**
     * @param int $stock
     * @return ProductBuilderInterface
     */
    public function setStock(int $stock): ProductBuilderInterface
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * @param string $currency
     * @return ProductBuilderInterface
     */
    public function setCurrency(string $currency): ProductBuilderInterface
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @param string $sku
     * @return ProductBuilderInterface
     */
    public function setSku(string $sku): ProductBuilderInterface
    {
        $this->sku = $sku;
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
     * @param string $id
     * @return ProductBuilderInterface
     */
    public function addCategory(string $id): ProductBuilderInterface
    {
        $this->categories[] = new Category(
            $id,
            null,
            null,
            null
        );
        return $this;
    }

    public function addFeature(string $featureId, string $choiceId): ProductBuilderInterface
    {
        $this->features[] = new ProductFeature($featureId, $choiceId);
        return $this;
    }

    /**
     * @return Product
     */
    public function getResult(): Product
    {
        $product = new Product();
        $product->setId($this->id);
        $product->setName($this->name);
        $product->setImage($this->image);
        $product->setDescription($this->description);
        $product->setNetPrice($this->netPrice);
        $product->setGrossPrice($this->grossPrice);
        $product->setGrossSalePrice($this->grossSalePrice);
        $product->setStock($this->stock);
        $product->setUrl($this->url);
        $product->setCurrency($this->currency);
        $product->setSku($this->sku);
        $product->setCategories($this->categories);
        $product->setFeatures($this->features);
        return $product;
    }
}