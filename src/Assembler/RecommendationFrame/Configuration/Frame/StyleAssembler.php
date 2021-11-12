<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Style;

/**
 * Class StyleAssembler
 *
 * @package Cyberkonsultant
 */
class StyleAssembler
{
    /**
     * @param Style $styleDTO
     * @return array
     */
    public function readDTO(Style $styleDTO): array
    {
        return [
            'background_color' => $styleDTO->getBackgroundColor(),
            'border_color' => $styleDTO->getBorderColor(),
            'border_color_on_hover' => $styleDTO->getBorderColorOnHover(),
        ];
    }

    /**
     * @param array $style
     * @return Style
     */
    public function writeDTO(array $style): Style
    {
        return new Style(
            $style['background_color'],
            $style['border_color'],
            $style['border_color_on_hover']
        );
    }
}