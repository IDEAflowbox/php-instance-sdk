<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame\Button;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Button\Dimensions;

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
        ];
    }

    /**
     * @param array $dimensions
     * @return Dimensions
     */
    public function writeDTO(array $dimensions): Dimensions
    {
        $dimensionsDto = new Dimensions();
        $dimensionsDto->setWidth($dimensions['width']);
        $dimensionsDto->setHeight($dimensions['height']);
        return $dimensionsDto;
    }
}