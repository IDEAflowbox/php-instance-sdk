<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame;

/**
 * Class FrameAssembler
 *
 * @package Cyberkonsultant
 */
class FrameAssembler
{
    /**
     * @param Frame $frameDTO
     * @return array
     */
    public function readDTO(Frame $frameDTO): array
    {
        return [
            'side_padding' => $frameDTO->getSidePadding(),
            'margin_bottom' => $frameDTO->getMarginBottom(),
            'margin_between' => $frameDTO->getMarginBetween(),
            'wrapper_styles' => $frameDTO->getWrapperStyles(),
            'title_text' => $frameDTO->getTitleText(),
            'title_wrapper_styles' => $frameDTO->getWrapperStyles(),
            'title_styles' => $frameDTO->getTitleStyles(),
        ];
    }

    /**
     * @param array $frame
     * @return Frame
     */
    public function writeDTO(array $frame): Frame
    {
        $frameDto = new Frame();
        $frameDto->setSidePadding($frame['side_padding']);
        $frameDto->setMarginBottom($frame['margin_bottom']);
        $frameDto->setMarginBetween($frame['margin_between']);
        $frameDto->setWrapperStyles($frame['wrapper_styles']);
        $frameDto->setTitleText($frame['title_text']);
        $frameDto->setTitleWrapperStyles($frame['title_wrapper_styles']);
        $frameDto->setTitleStyles($frame['title_styles']);
        return $frameDto;
    }
}