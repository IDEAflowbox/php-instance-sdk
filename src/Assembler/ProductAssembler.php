<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\Category;
use Cyberkonsultant\DTO\Product;
use Cyberkonsultant\Utils\DateTimeFormat;

/**
 * Class ProductAssembler
 *
 * @package Cyberkonsultant
 */
class ProductAssembler implements DataAssemblerInterface
{
    /**
     * @var CategoryAssembler
     */
    protected $categoryAssembler;

    /**
     * @var ProductFeatureAssembler
     */
    protected $productFeatureAssembler;

    /**
     * ProductAssembler constructor.
     */
    public function __construct()
    {
        $this->categoryAssembler = new CategoryAssembler();
        $this->productFeatureAssembler = new ProductFeatureAssembler();
    }

    /**
     * @param Product $productDTO
     * @return array
     */
    public function readDTO(Product $productDTO): array
    {
        $categoryAssembler = $this->categoryAssembler;
        $productFeatureAssembler = $this->productFeatureAssembler;
        return [
            'id' => $productDTO->getId(),
            'parent_id' => $productDTO->getParentId(),
            'name' => $productDTO->getName(),
            'image' => $productDTO->getImage(),
            'description' => $productDTO->getDescription(),
            'net_price' => $productDTO->getNetPrice(),
            'gross_price' => $productDTO->getGrossPrice(),
            'gross_sale_price' => $productDTO->getGrossSalePrice(),
            'currency' => $productDTO->getCurrency(),
            'sku' => $productDTO->getSku(),
            'stock' => $productDTO->getStock(),
            'url' => $productDTO->getUrl(),
            'categories' => array_map(static function ($category) use ($categoryAssembler) {
                return $categoryAssembler->readDTO($category);
            }, $productDTO->getCategories()),
            'features' => array_map(static function ($feature) use ($productFeatureAssembler) {
                return $productFeatureAssembler->readDTO($feature);
            }, $productDTO->getFeatures()),
            'deleted_at' => $productDTO->getDeletedAt() ? $productDTO->getDeletedAt()->format(DateTimeFormat::ZULU) : null,
            'created_at' => $productDTO->getCreatedAt() ? $productDTO->getCreatedAt()->format(DateTimeFormat::ZULU) : null,
            'updated_at' => $productDTO->getUpdatedAt() ? $productDTO->getUpdatedAt()->format(DateTimeFormat::ZULU) : null,
        ];
    }

    /**
     * @param array $product
     * @return Product
     */
    public function writeDTO(array $product): Product
    {
        $categoryAssembler = $this->categoryAssembler;
        $categories = $product['categories'] ? array_map(static function (array $category) use ($categoryAssembler) {
                return $categoryAssembler->writeDTO($category);
            }, $product['categories']) : [];

        $deletedAt = isset($product['deleted_at']) ? strtotime($product['deleted_at']) : null;
        $createdAt = strtotime($product['created_at']);
        $updatedAt = strtotime($product['updated_at']);

        $productDTO = new Product();
        $productDTO->setId($product['id']);
        $productDTO->setParentId(isset($product['parent_id']) ? $product['parent_id'] : null);
        $productDTO->setName($product['name']);
        $productDTO->setImage($product['image']);
        $productDTO->setDescription($product['description']);
        $productDTO->setNetPrice($product['net_price']);
        $productDTO->setGrossPrice($product['gross_price']);
        $productDTO->setUrl($product['url']);
        $productDTO->setCategories($categories);
        $productDTO->setGrossSalePrice(isset($product['gross_sale_price']) ? $product['gross_sale_price'] : null);
        $productDTO->setCurrency($product['currency']);
        $productDTO->setSku($product['sku']);
        $productDTO->setStock($product['stock']);
        $productDTO->setDeletedAt($deletedAt ? (new \DateTime())->setTimestamp($deletedAt) : null);
        $productDTO->setCreatedAt($createdAt ? (new \DateTime())->setTimestamp($createdAt) : null);
        $productDTO->setUpdatedAt($updatedAt ? (new \DateTime())->setTimestamp($updatedAt) : null);

        return $productDTO;
    }
}