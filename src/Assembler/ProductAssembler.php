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
            'name' => $productDTO->getName(),
            'image' => $productDTO->getImage(),
            'description' => $productDTO->getDescription(),
            'net_price' => $productDTO->getNetPrice(),
            'gross_price' => $productDTO->getGrossPrice(),
            'gross_sale_price' => $productDTO->getGrossSalePrice(),
            'stock' => $productDTO->getStock(),
            'url' => $productDTO->getUrl(),
            'categories' => array_map(static function ($category) use ($categoryAssembler) {
                return $categoryAssembler->readDTO($category);
            }, $productDTO->getCategories()),
            'features' => array_map(static function ($feature) use ($productFeatureAssembler) {
                return $productFeatureAssembler->readDTO($feature);
            }, $productDTO->getFeatures()),
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

        $createdAt = strtotime($product['created_at']);
        $updatedAt = strtotime($product['updated_at']);

        $productDTO = new Product();
        $productDTO->setId($product['id']);
        $productDTO->setName($product['name']);
        $productDTO->setImage($product['image']);
        $productDTO->setDescription($product['description']);
        $productDTO->setNetPrice($product['net_price']);
        $productDTO->setGrossPrice($product['gross_price']);
        $productDTO->setUrl($product['url']);
        $productDTO->setCategories($categories);
        $productDTO->setGrossSalePrice(isset($product['gross_sale_price']) ? $product['gross_sale_price'] : null);
        $productDTO->setStock($product['stock']);
        $productDTO->setCreatedAt($createdAt ? (new \DateTime())->setTimestamp($createdAt) : null);
        $productDTO->setUpdatedAt($updatedAt ? (new \DateTime())->setTimestamp($updatedAt) : null);

        return $productDTO;
    }
}