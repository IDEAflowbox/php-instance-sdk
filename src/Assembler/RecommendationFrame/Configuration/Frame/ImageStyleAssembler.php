<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\ImageStyle;

/**
 * Class ImageStyleAssembler
 *
 * @package Cyberkonsultant
 */
class ImageStyleAssembler
{
    /**
     * @param ImageStyle $imageStyleDTO
     * @return array
     */
    public function readDTO(ImageStyle $imageStyleDTO): array
    {
        return [
            'height' => $imageStyleDTO->getHeight(),
            'background_color' => $imageStyleDTO->getBackgroundColor(),
        ];
    }

    /**
     * @param array $imageStyle
     * @return ImageStyle
     */
    public function writeDTO(array $imageStyle): ImageStyle
    {
        return new ImageStyle(
            $imageStyle['height'],
            $imageStyle['background_color']
        );
    }
}