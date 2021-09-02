<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Button\Dimensions;

/**
 * Class CategoryAssembler
 *
 * @package Cyberkonsultant
 */
class CategoryAssembler implements DataAssemblerInterface
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
        return new Dimensions(
            $dimensions['width'],
            $dimensions['height']
        );
    }
}