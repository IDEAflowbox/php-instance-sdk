<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\EnabledElements;

class EnabledElementsAssembler
{
    public function readDTO(EnabledElements $enabledElementsDTO): array
    {
        return [
            'thumbnail' => $enabledElementsDTO->isThumbnail(),
            'button' => $enabledElementsDTO->isButton(),
            'contents' => $enabledElementsDTO->isContents(),
        ];
    }

    public function writeDTO(array $enabledElements): EnabledElements
    {
        return new EnabledElements(
            $enabledElements['thumbnail'],
            $enabledElements['button'],
            $enabledElements['contents']
        );
    }
}