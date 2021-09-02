<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Text;

class TextAssembler
{
    public function readDTO(Text $textDTO): array
    {
        return [
            'product_contents' => $textDTO->getProductContents(),
            'button' => $textDTO->getButton(),
        ];
    }

    public function writeDTO(array $text): Text
    {
        return new Text(
            $text['product_contents'],
            $text['button']
        );
    }
}