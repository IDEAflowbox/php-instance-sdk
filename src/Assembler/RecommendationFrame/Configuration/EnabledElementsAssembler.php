<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\EnabledElements;

/**
 * Class EnabledElementsAssembler
 *
 * @package Cyberkonsultant
 */
class EnabledElementsAssembler
{
    /**
     * @param EnabledElements $enabledElementsDTO
     * @return array
     */
    public function readDTO(EnabledElements $enabledElementsDTO): array
    {
        return [
            'image' => $enabledElementsDTO->isImage(),
            'product_name' => $enabledElementsDTO->isProductName(),
            'price' => $enabledElementsDTO->isPrice(),
            'button' => $enabledElementsDTO->isButton(),
        ];
    }

    /**
     * @param array $enabledElements
     * @return EnabledElements
     */
    public function writeDTO(array $enabledElements): EnabledElements
    {
        $enabledElementsDto = new EnabledElements();
        $enabledElementsDto->setImage($enabledElements['image']);
        $enabledElementsDto->setProductName($enabledElements['product_name']);
        $enabledElementsDto->setPrice($enabledElements['price']);
        $enabledElementsDto->setButton($enabledElements['button']);
        return $enabledElementsDto;
    }
}