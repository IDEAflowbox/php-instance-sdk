<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Style;

class StyleAssembler
{
    public function readDTO(Style $styleDTO): array
    {
        return [
            'background_color' => $styleDTO->getBackgroundColor(),
            'border_color' => $styleDTO->getBorderColor(),
            'border_color_on_hover' => $styleDTO->getBorderColorOnHover(),
        ];
    }

    public function writeDTO(array $style): Style
    {
        return new Style(
            $style['background_color'],
            $style['border_color'],
            $style['border_color_on_hover'],
        );
    }
}