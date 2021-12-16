<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\User;

/**
 * Interface UserBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface UserBuilderInterface
{
    /**
     * @param string $id
     * @return UserBuilderInterface
     */
    public function setId(string $id): UserBuilderInterface;

    /**
     * @param string $email
     * @return UserBuilderInterface
     */
    public function setEmail(string $email): UserBuilderInterface;

    /**
     * @param string|null $username
     * @return UserBuilderInterface
     */
    public function setUsername(?string $username = null): UserBuilderInterface;

    /**
     * @param string|null $firstName
     * @return UserBuilderInterface
     */
    public function setFirstName(?string $firstName = null): UserBuilderInterface;

    /**
     * @param string|null $lastName
     * @return UserBuilderInterface
     */
    public function setLastName(?string $lastName = null): UserBuilderInterface;

    /**
     * @param string|null $phoneNumber
     * @return UserBuilderInterface
     */
    public function setPhoneNumber(?string $phoneNumber = null): UserBuilderInterface;

    /**
     * @param string|null $sex
     * @return UserBuilderInterface
     */
    public function setSex(?string $sex = null): UserBuilderInterface;

    /**
     * @param string|null $country
     * @return UserBuilderInterface
     */
    public function setCountry(?string $country = null): UserBuilderInterface;

    /**
     * @param string|null $city
     * @return UserBuilderInterface
     */
    public function setCity(?string $city = null): UserBuilderInterface;

    /**
     * @param string|null $postcode
     * @return UserBuilderInterface
     */
    public function setPostcode(?string $postcode = null): UserBuilderInterface;

    /**
     * @return User
     */
    public function getResult(): User;
}