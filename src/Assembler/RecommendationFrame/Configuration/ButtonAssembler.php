<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Button;

/**
 * Class ButtonAssembler
 *
 * @package Cyberkonsultant
 */
class ButtonAssembler
{
    /**
     * @param Button $buttonDto
     * @return array
     */
    public function readDTO(Button $buttonDto): array
    {
        return [
            'width' => $buttonDto->getWidth(),
            'height' => $buttonDto->getHeight(),
            'position' => $buttonDto->getPosition(),
            'background_color' => $buttonDto->getBackgroundColor(),
            'border_color' => $buttonDto->getBorderColor(),
            'text_color' => $buttonDto->getTextColor(),
            'text_size' => $buttonDto->getTextSize(),
            'border_radius' => $buttonDto->getBorderRadius(),
            'side_padding' => $buttonDto->getSidePadding(),
            'text' => $buttonDto->getText(),
        ];
    }

    /**
     * @param array $button
     * @return Button
     */
    public function writeDTO(array $button): Button
    {
        $buttonDto = new Button();
        $buttonDto->setWidth($button['width']);
        $buttonDto->setHeight($button['height']);
        $buttonDto->setPosition($button['position']);
        $buttonDto->setBackgroundColor($button['background_color']);
        $buttonDto->setBorderColor($button['border_color']);
        $buttonDto->setTextColor($button['text_color']);
        $buttonDto->setTextSize($button['text_size']);
        $buttonDto->setBorderRadius($button['border_radius']);
        $buttonDto->setSidePadding($button['side_padding']);
        $buttonDto->setText($button['text']);
        return $buttonDto;
    }
}