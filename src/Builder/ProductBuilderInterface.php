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
     * @param string $code
     * @return ProductBuilderInterface
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
     * @return Product
     */
    public function getResult(): Product;
}