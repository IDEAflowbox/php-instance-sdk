<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Text;

/**
 * Class TextAssembler
 *
 * @package Cyberkonsultant
 */
class TextAssembler
{
    /**
     * @param Text $textDTO
     * @return array
     */
    public function readDTO(Text $textDTO): array
    {
        return [
            'product_contents' => $textDTO->getProductContents(),
            'button' => $textDTO->getButton(),
        ];
    }

    /**
     * @param array $text
     * @return Text
     */
    public function writeDTO(array $text): Text
    {
        return new Text(
            $text['product_contents'],
            $text['button']
        );
    }
}