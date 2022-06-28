<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Arrow;

/**
 * Class ArrowAssembler
 *
 * @package Cyberkonsultant
 */
class ArrowAssembler
{
    /**
     * @param Arrow $arrowDto
     * @return array
     */
    public function readDTO(Arrow $arrowDto): array
    {
        return [
            'size' => $arrowDto->getSize(),
            'color' => $arrowDto->getColor(),
            'style' => $arrowDto->getStyle(),
        ];
    }

    /**
     * @param array $arrow
     * @return Arrow
     */
    public function writeDTO(array $arrow): Arrow
    {
        $arrowDto = new Arrow();
        $arrowDto->setSize($arrow['size']);
        $arrowDto->setColor($arrow['color']);
        $arrowDto->setStyle($arrow['style']);
        return $arrowDto;
    }
}