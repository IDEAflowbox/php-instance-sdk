<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Button;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame\Button\DimensionsAssembler;

/**
 * Class ButtonAssembler
 *
 * @package Cyberkonsultant
 */
class ButtonAssembler
{
    /**
     * @var DimensionsAssembler
     */
    protected $dimensionsAssembler;

    /**
     * ButtonAssembler constructor.
     */
    public function __construct()
    {
        $this->dimensionsAssembler = new DimensionsAssembler();
    }

    /**
     * @param Button $button
     * @return array
     */
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

    /**
     * @param array $button
     * @return Button
     */
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