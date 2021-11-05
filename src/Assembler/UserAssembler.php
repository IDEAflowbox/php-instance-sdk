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
        $segmentAssembler = new SegmentAssembler();
        $eventAssembler = new EventAssembler();
        $pageEventAssembler = new PageEventAssembler();

        $userDTO = new User();
        $userDTO->setId($user['id']);
        $userDTO->setAnonymous($user['anonymous']);

        if (isset($user['username'])) {
            $userDTO->setUsername($user['username']);
        }
        if (isset($user['email'])) {
            $userDTO->setEmail($user['email']);
        }
        if (isset($user['first_name'])) {
            $userDTO->setFirstName($user['first_name']);
        }
        if (isset($user['last_name'])) {
            $userDTO->setLastName($user['last_name']);
        }
        if (isset($user['phone_number'])) {
            $userDTO->setPhoneNumber($user['phone_number']);
        }
        if (isset($user['sex'])) {
            $userDTO->setSex($user['sex']);
        }
        if (isset($user['country'])) {
            $userDTO->setCountry($user['country']);
        }
        if (isset($user['city'])) {
            $userDTO->setCity($user['city']);
        }
        if (isset($user['postcode'])) {
            $userDTO->setPostcode($user['postcode']);
        }
        if (isset($user['segments'])) {
            $userDTO->setSegments(array_map(static function ($segment) use ($segmentAssembler) {
                return $segmentAssembler->writeDTO($segment);
            }, $user['segments']));
        }
        if (isset($user['events'])) {
            $userDTO->setEvents(array_map(static function ($event) use ($eventAssembler) {
                return $eventAssembler->writeDTO($event);
            }, $user['events']));
        }
        if (isset($user['page_events'])) {
            $userDTO->setPageEvents(array_map(static function ($pageEvent) use ($pageEventAssembler) {
                return $pageEventAssembler->writeDTO($pageEvent);
            }, $user['page_events']));
        }

        return $userDTO;
    }
}