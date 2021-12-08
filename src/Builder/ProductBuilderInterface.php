<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Product;

/**
 * Interface ProductBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface ProductBuilderInterface
{
    /**
     * @param string $id
     * @return ProductBuilderInterface
     */
    public function setId(string $id): ProductBuilderInterface;

    /**
     * @param string $code
     * @return ProductBuilderInterface
     * @deprecated since version 1.2.6. Use method `setId` instead.
     */
    public function setCode(string $code): ProductBuilderInterface;

    /**
     * @param string $name
     * @return ProductBuilderInterface
     */
    public function setName(string $name): ProductBuilderInterface;

    /**
     * @param string $image
     * @return ProductBuilderInterface
     */
    public function setImage(string $image): ProductBuilderInterface;

    /**
     * @param string $description
     * @return ProductBuilderInterface
     */
    public function setDescription(string $description): ProductBuilderInterface;

    /**
     * @param float $netPrice
     * @return ProductBuilderInterface
     */
    public function setNetPrice(float $netPrice): ProductBuilderInterface;

    /**
     * @param float $grossPrice
     * @return ProductBuilderInterface
     */
    public function setGrossPrice(float $grossPrice): ProductBuilderInterface;

    /**
     * @param float|null $grossSalePrice
     * @return ProductBuilderInterface
     */
    public function setGrossSalePrice(?float $grossSalePrice): ProductBuilderInterface;

    /**
     * @param string $currency
     * @return ProductBuilderInterface
     */
    public function setCurrency(string $currency): ProductBuilderInterface;

    /**
     * @param string $sku
     * @return ProductBuilderInterface
     */
    public function setSku(string $sku): ProductBuilderInterface;

    /**
     * @param int $stock
     * @return ProductBuilderInterface
     */
    public function setStock(int $stock): ProductBuilderInterface;

    /**
     * @param string $url
     * @return ProductBuilderInterface
     */
    public function setUrl(string $url): ProductBuilderInterface;

    /**
     * @param string $id
     * @return ProductBuilderInterface
     */
    public function addCategory(string $id): ProductBuilderInterface;

    /**
     * @param string $featureId
     * @param string $choiceId
     * @return ProductBuilderInterface
     */
    public function addFeature(string $featureId, string $choiceId): ProductBuilderInterface;

    /**
     * @return Product
     */
    public function getResult(): Product;
}