<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Dimensions;

/**
 * Class DimensionsAssembler
 *
 * @package Cyberkonsultant
 */
class DimensionsAssembler
{
    /**
     * @param Dimensions $dimensionsDTO
     * @return array
     */
    public function readDTO(Dimensions $dimensionsDTO): array
    {
        return [
            'width' => $dimensionsDTO->getWidth(),
            'height' => $dimensionsDTO->getHeight(),
            'margin_top' => $dimensionsDTO->getMarginTop(),
            'margin_bottom' => $dimensionsDTO->getMarginBottom(),
            'margin_side' => $dimensionsDTO->getMarginSide(),
            'space_between_elements' => $dimensionsDTO->getSpaceBetweenElements(),
        ];
    }

    /**
     * @param array $dimensions
     * @return Dimensions
     */
    public function writeDTO(array $dimensions): Dimensions
    {
        return new Dimensions(
            $dimensions['width'],
            $dimensions['height'],
            $dimensions['margin_top'],
            $dimensions['margin_bottom'],
            $dimensions['margin_side'],
            $dimensions['space_between_elements']
        );
    }
}