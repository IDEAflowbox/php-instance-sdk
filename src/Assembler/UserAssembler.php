<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\User;

/**
 * Class UserAssembler
 *
 * @package Cyberkonsultant
 */
class UserAssembler implements DataAssemblerInterface
{
    /**
     * @param User $userDTO
     * @return array
     */
    public function readDTO(User $userDTO): array
    {
        return [
            'id' => $userDTO->getId(),
            'anonymous' => $userDTO->isAnonymous(),
            'username' => $userDTO->getUsername(),
            'first_name' => $userDTO->getFirstName(),
            'last_name' => $userDTO->getLastName(),
            'sex' => $userDTO->getSex(),
            'created_at' => $userDTO->getCreatedAt()->format(DATE_ISO8601),
            'updated_at' => $userDTO->getUpdatedAt()->format(DATE_ISO8601),
        ];
    }

    /**
     * @param array $user
     * @return User
     */
    public function writeDTO(array $user): User
    {
        return new User(
            $user['id'],
            $user['anonymous'],
            $user['username'],
            $user['first_name'],
            $user['last_name'],
            $user['sex'],
            (new \DateTime())->setTimestamp(strtotime($user['created_at'])),
            (new \DateTime())->setTimestamp(strtotime($user['updated_at']))
        );
    }
}