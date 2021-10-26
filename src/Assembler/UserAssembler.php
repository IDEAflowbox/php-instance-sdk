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
            'email' => $userDTO->getEmail(),
            'first_name' => $userDTO->getFirstName(),
            'last_name' => $userDTO->getLastName(),
            'phone_number' => $userDTO->getPhoneNumber(),
            'sex' => $userDTO->getSex(),
            'country' => $userDTO->getCountry(),
            'city' => $userDTO->getCity(),
            'postcode' => $userDTO->getPostcode(),
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
            isset($user['username']) ? $user['username'] : null,
            isset($user['email']) ? $user['email'] : null,
            isset($user['first_name']) ? $user['first_name'] : null,
            isset($user['last_name']) ? $user['last_name'] : null,
            isset($user['phone_number']) ? $user['phone_number'] : null,
            isset($user['sex']) ? $user['sex'] : null,
            isset($user['country']) ? $user['country'] : null,
            isset($user['city']) ? $user['city'] : null,
            isset($user['postcode']) ? $user['postcode'] : null,
        );
    }
}