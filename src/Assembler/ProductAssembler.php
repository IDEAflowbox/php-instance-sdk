<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\Category;
use Cyberkonsultant\DTO\Product;

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
            'url' => $productDTO->getUrl(),
            'categories' => array_map(static function ($category) use ($categoryAssembler) {
                return $categoryAssembler->readDTO($category);
            }, $productDTO->getCategories()),
            'features' => array_map(static function ($feature) use ($productFeatureAssembler) {
                return $productFeatureAssembler->readDTO($feature);
            }, $productDTO->getFeatures()),
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

        return new Product(
            $product['id'],
            $product['name'],
            $product['image'],
            $product['description'],
            $product['net_price'],
            $product['gross_price'],
            $product['url'],
            $categories
        );
    }
}