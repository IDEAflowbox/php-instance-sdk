<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\SenderWithCredentials;

/**
 * Class SenderWithCredentialsAssembler
 *
 * @package Cyberkonsultant
 */
class SenderWithCredentialsAssembler implements DataAssemblerInterface
{
    /**
     * @param SenderWithCredentials $senderDTO
     * @return array
     */
    public function readDTO(SenderWithCredentials $senderDTO): array
    {
        return [
            'id' => $senderDTO->getId(),
            'name' => $senderDTO->getName(),
            'email' => $senderDTO->getEmail(),
            'activated' => $senderDTO->isActivated(),
            'host' => $senderDTO->getHost(),
            'username' => $senderDTO->getUsername(),
            'password' => $senderDTO->getPassword(),
            'port' => $senderDTO->getPort(),
        ];
    }

    /**
     * @param array $sender
     * @return SenderWithCredentials
     */
    public function writeDTO(array $sender): SenderWithCredentials
    {
        $senderDTO = new SenderWithCredentials();
        $senderDTO->setId($sender['id']);
        $senderDTO->setName($sender['name']);
        $senderDTO->setEmail($sender['email']);
        $senderDTO->setActivated($sender['activated']);
        $senderDTO->setHost($sender['activated']);
        $senderDTO->setUsername($sender['username']);
        $senderDTO->setPassword($sender['password']);
        $senderDTO->setPort($sender['port']);
        return $senderDTO;
    }
}