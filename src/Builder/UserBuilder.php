<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\User;

/**
 * Class UserBuilder
 *
 * @package Cyberkonsultant
 */
class UserBuilder implements UserBuilderInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string|null
     */
    protected $username = null;

    /**
     * @var string|null
     */
    protected $firstName = null;

    /**
     * @var string|null
     */
    protected $lastName = null;

    /**
     * @var string|null
     */
    protected $phoneNumber = null;

    /**
     * @var string|null
     */
    protected $sex = null;

    /**
     * @var string|null
     */
    protected $country = null;

    /**
     * @var string|null
     */
    protected $city = null;

    /**
     * @var string|null
     */
    protected $postcode = null;

    /**
     * @param string $id
     * @return UserBuilderInterface
     */
    public function setId(string $id): UserBuilderInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $email
     * @return UserBuilderInterface
     */
    public function setEmail(string $email): UserBuilderInterface
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string|null $username
     * @return UserBuilderInterface
     */
    public function setUsername(?string $username = null): UserBuilderInterface
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param string|null $firstName
     * @return UserBuilderInterface
     */
    public function setFirstName(?string $firstName = null): UserBuilderInterface
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @param string|null $lastName
     * @return UserBuilderInterface
     */
    public function setLastName(?string $lastName = null): UserBuilderInterface
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @param string|null $phoneNumber
     * @return UserBuilderInterface
     */
    public function setPhoneNumber(?string $phoneNumber = null): UserBuilderInterface
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @param string|null $sex
     * @return UserBuilderInterface
     */
    public function setSex(?string $sex = null): UserBuilderInterface
    {
        $this->sex = $sex;
        return $this;
    }

    /**
     * @param string|null $country
     * @return UserBuilderInterface
     */
    public function setCountry(?string $country = null): UserBuilderInterface
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @param string|null $city
     * @return UserBuilderInterface
     */
    public function setCity(?string $city = null): UserBuilderInterface
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @param string|null $postcode
     * @return UserBuilderInterface
     */
    public function setPostcode(?string $postcode = null): UserBuilderInterface
    {
        $this->postcode = $postcode;
        return $this;
    }

    /**
     * @return User
     */
    public function getResult(): User
    {
        $user = new User();
        $user->setAnonymous(false);
        $user->setId($this->id);
        $user->setEmail($this->email);
        $user->setFirstName($this->firstName);
        $user->setLastName($this->lastName);
        $user->setPhoneNumber($this->phoneNumber);
        $user->setSex($this->sex);
        $user->setCountry($this->country);
        $user->setCity($this->city);
        $user->setPostcode($this->postcode);
        return $user;
    }
}