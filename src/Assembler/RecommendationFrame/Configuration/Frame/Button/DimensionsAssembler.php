<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame\Button;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Button\Dimensions;

class DimensionsAssembler
{
    public function readDTO(Dimensions $dimensionsDTO): array
    {
        return [
            'width' => $dimensionsDTO->getWidth(),
            'height' => $dimensionsDTO->getHeight(),
        ];
    }

    public function writeDTO(array $dimensions): Dimensions
    {
        return new Dimensions(
            $dimensions['width'],
            $dimensions['height']
        );
    }
}