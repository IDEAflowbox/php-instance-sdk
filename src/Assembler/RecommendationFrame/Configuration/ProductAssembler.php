<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Product;

/**
 * Class ProductAssembler
 *
 * @package Cyberkonsultant
 */
class ProductAssembler
{
    /**
     * @param Product $productDTO
     * @return array
     */
    public function readDTO(Product $productDTO): array
    {
        return [
            'side_padding' => $productDTO->getSidePadding(),
            'padding_top' => $productDTO->getPaddingTop(),
            'padding_bottom' => $productDTO->getPaddingBottom(),
            'border_radius' => $productDTO->getBorderRadius(),
            'background_color' => $productDTO->getBackgroundColor(),
        ];
    }

    /**
     * @param array $product
     * @return Product
     */
    public function writeDTO(array $product): Product
    {
        $productDto = new Product();
        $productDto->setSidePadding($product['side_padding']);
        $productDto->setPaddingTop($product['padding_top']);
        $productDto->setPaddingBottom($product['padding_bottom']);
        $productDto->setBorderRadius($product['border_radius']);
        $productDto->setBackgroundColor($product['background_color']);
        return $productDto;
    }
}