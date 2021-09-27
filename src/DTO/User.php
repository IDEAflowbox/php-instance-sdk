<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

/**
 * Class User
 *
 * @package Cyberkonsultant
 */
class User
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var bool
     */
    protected $anonymous;

    /**
     * @var string|null
     */
    protected $username;

    /**
     * @var string|null
     */
    protected $firstName;

    /**
     * @var string|null
     */
    protected $lastName;

    /**
     * @var string|null
     */
    protected $sex;

    /**
     * @var string|null
     */
    protected $country;

    /**
     * @var string|null
     */
    protected $city;

    /**
     * @var string|null
     */
    protected $postcode;

    /**
     * User constructor.
     * @param string $id
     * @param bool $anonymous
     * @param string|null $username
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $sex
     * @param string|null $country
     * @param string|null $city
     * @param string|null $postcode
     */
    public function __construct(
        string $id,
        bool $anonymous,
        ?string $username,
        ?string $firstName,
        ?string $lastName,
        ?string $sex,
        ?string $country,
        ?string $city,
        ?string $postcode
    ) {
        $this->id = $id;
        $this->anonymous = $anonymous;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->sex = $sex;
        $this->country = $country;
        $this->city = $city;
        $this->postcode = $postcode;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isAnonymous(): bool
    {
        return $this->anonymous;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @return string|null
     */
    public function getSex(): ?string
    {
        return $this->sex;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param string|null $firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @param string|null $sex
     */
    public function setSex(?string $sex): void
    {
        $this->sex = $sex;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    /**
     * @param string|null $postcode
     */
    public function setPostcode(?string $postcode): void
    {
        $this->postcode = $postcode;
    }
}