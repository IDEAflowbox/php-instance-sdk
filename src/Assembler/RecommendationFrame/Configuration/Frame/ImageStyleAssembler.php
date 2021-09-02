<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\ImageStyle;

class ImageStyleAssembler
{
    public function readDTO(ImageStyle $imageStyleDTO): array
    {
        return [
            'height' => $imageStyleDTO->getHeight(),
            'background_color' => $imageStyleDTO->getBackgroundColor(),
        ];
    }

    public function writeDTO(array $imageStyle): ImageStyle
    {
        return new ImageStyle(
            $imageStyle['height'],
            $imageStyle['background_color']
        );
    }
}