<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\Sender;

/**
 * Class SenderAssembler
 *
 * @package Cyberkonsultant
 */
class SenderAssembler implements DataAssemblerInterface
{
    /**
     * @param Sender $senderDTO
     * @return array
     */
    public function readDTO(Sender $senderDTO): array
    {
        return [
            'id' => $senderDTO->getId(),
            'name' => $senderDTO->getName(),
            'email' => $senderDTO->getEmail(),
            'activated' => $senderDTO->isActivated(),
        ];
    }

    /**
     * @param array $sender
     * @return Sender
     */
    public function writeDTO(array $sender): Sender
    {
        $senderDTO = new Sender();
        $senderDTO->setId($sender['id']);
        $senderDTO->setName($sender['name']);
        $senderDTO->setEmail($sender['email']);
        $senderDTO->setActivated($sender['activated']);
        return $senderDTO;
    }
}