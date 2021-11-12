<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\Feature;

use Cyberkonsultant\DTO\Feature\Choice;

/**
 * Class ChoiceAssembler
 *
 * @package Cyberkonsultant
 */
class ChoiceAssembler
{
    /**
     * @param Choice $choiceDTO
     * @return array
     */
    public function readDTO(Choice $choiceDTO): array
    {
        return [
            'id' => $choiceDTO->getId(),
            'name' => $choiceDTO->getName(),
        ];
    }

    /**
     * @param array $choice
     * @return Choice
     */
    public function writeDTO(array $choice): Choice
    {
        return new Choice(
            $choice['id'],
            $choice['name']
        );
    }
}