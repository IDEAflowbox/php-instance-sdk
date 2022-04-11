<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\EnabledElements;

/**
 * Class EnabledElementsAssembler
 *
 * @package Cyberkonsultant
 */
class EnabledElementsAssembler
{
    /**
     * @param EnabledElements $enabledElementsDTO
     * @return array
     */
    public function readDTO(EnabledElements $enabledElementsDTO): array
    {
        return [
            'thumbnail' => $enabledElementsDTO->isThumbnail(),
            'button' => $enabledElementsDTO->isButton(),
            'contents' => $enabledElementsDTO->isContents(),
        ];
    }

    /**
     * @param array $enabledElements
     * @return EnabledElements
     */
    public function writeDTO(array $enabledElements): EnabledElements
    {
        $enabledElementsDto = new EnabledElements();
        $enabledElementsDto->setThumbnail($enabledElements['thumbnail']);
        $enabledElementsDto->setButton($enabledElements['button']);
        $enabledElementsDto->setContents($enabledElements['contents']);
        return $enabledElementsDto;
    }
}