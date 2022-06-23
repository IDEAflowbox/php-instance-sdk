<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Image;

/**
 * Class ImageAssembler
 *
 * @package Cyberkonsultant
 */
class ImageAssembler
{
    /**
     * @param Image $imageDto
     * @return array
     */
    public function readDTO(Image $imageDto): array
    {
        return [
            'width' => $imageDto->getWidth(),
            'height' => $imageDto->getHeight(),
        ];
    }

    /**
     * @param array $image
     * @return Image
     */
    public function writeDTO(array $image): Image
    {
        $imageDto = new Image();
        $imageDto->setWidth($image['width']);
        $imageDto->setHeight($image['height']);
        return $imageDto;
    }
}