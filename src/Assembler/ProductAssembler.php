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
     * ProductAssembler constructor.
     */
    public function __construct()
    {
        $this->categoryAssembler = new CategoryAssembler();
    }

    /**
     * @param Product $productDTO
     * @return array
     */
    public function readDTO(Product $productDTO): array
    {
        $categoryAssembler = $this->categoryAssembler;
        return [
            'id' => $productDTO->getId(),
            'code' => $productDTO->getCode(),
            'name' => $productDTO->getName(),
            'image' => $productDTO->getImage(),
            'description' => $productDTO->getDescription(),
            'net_price' => $productDTO->getNetPrice(),
            'gross_price' => $productDTO->getGrossPrice(),
            'url' => $productDTO->getUrl(),
            'categories' => array_map(static function ($category) use ($categoryAssembler) {
                return $categoryAssembler->readDTO($category);
            }, $productDTO->getCategories()),
            'created_at' => $productDTO->getCreatedAt()->format(DATE_ISO8601),
            'updated_at' => $productDTO->getUpdatedAt()->format(DATE_ISO8601),
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
            $product['code'],
            $product['name'],
            $product['image'],
            $product['description'],
            $product['net_price'],
            $product['gross_price'],
            $product['url'],
            $categories,
            (new \DateTime())->setTimestamp(strtotime($product['created_at'])),
            (new \DateTime())->setTimestamp(strtotime($product['updated_at']))
        );
    }
}