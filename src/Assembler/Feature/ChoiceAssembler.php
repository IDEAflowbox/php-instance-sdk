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
            'associated_to' => $choiceDTO->getAssociatedTo()
        ];
    }

    /**
     * @param array $choice
     * @return Choice
     */
    public function writeDTO(array $choice): Choice
    {
        $choiceDto = new Choice();
        $choiceDto->setId($choice['id']);
        $choiceDto->setName($choice['name']);
        $choiceDto->setAssociatedTo($choice['associated_to']);
        return $choiceDto;
    }
}