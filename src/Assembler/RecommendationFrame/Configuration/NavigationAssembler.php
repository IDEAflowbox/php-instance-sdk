<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Navigation;

/**
 * Class NavigationAssembler
 *
 * @package Cyberkonsultant
 */
class NavigationAssembler
{
    /**
     * @param Navigation $navigationDTO
     * @return array
     */
    public function readDTO(Navigation $navigationDTO): array
    {
        return [
            'size' => $navigationDTO->getSize(),
            'style' => $navigationDTO->getStyle(),
            'color' => $navigationDTO->getColor(),
        ];
    }

    /**
     * @param array $navigation
     * @return Navigation
     */
    public function writeDTO(array $navigation): Navigation
    {
        $navigationDto = new Navigation();
        $navigationDto->setSize($navigation['size']);
        $navigationDto->setStyle($navigation['style']);
        $navigationDto->setColor($navigation['color']);
        return $navigationDto;
    }
}