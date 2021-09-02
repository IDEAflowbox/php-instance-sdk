<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Button;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame\Button\DimensionsAssembler;

class ButtonAssembler
{
    protected $dimensionsAssembler;

    public function __construct()
    {
        $this->dimensionsAssembler = new DimensionsAssembler();
    }

    public function readDTO(Button $button): array
    {
        return [
            'dimensions' => $this->dimensionsAssembler->readDTO($button->getDimensions()),
            'border_radius' => $button->getBorderRadius(),
            'position' => $button->getPosition(),
            'background_color' => $button->getBackgroundColor(),
            'text_color' => $button->getTextColor(),
        ];
    }

    public function writeDTO(array $button): Button
    {
        return new Button(
            $this->dimensionsAssembler->writeDTO($button['dimensions']),
            $button['border_radius'],
            $button['position'],
            $button['background_color'],
            $button['text_color']
        );
    }
}