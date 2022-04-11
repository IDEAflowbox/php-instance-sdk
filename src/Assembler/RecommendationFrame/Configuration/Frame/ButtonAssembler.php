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
        $buttonDto = new Button();
        $buttonDto->setDimensions($this->dimensionsAssembler->writeDTO($button['dimensions']));
        $buttonDto->setBorderRadius($button['border_radius']);
        $buttonDto->setPosition($button['position']);
        $buttonDto->setBackgroundColor($button['background_color']);
        $buttonDto->setTextColor($button['text_color']);
        return $buttonDto;
    }
}