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
    protected $email;

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
    protected $phoneNumber;

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
     * @var array|Segment[]
     */
    protected $segments = [];

    /**
     * @var array|Event[]
     */
    protected $events = [];

    /**
     * @var array|PageEvent[]
     */
    protected $pageEvents = [];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return bool
     */
    public function isAnonymous(): bool
    {
        return $this->anonymous;
    }

    /**
     * @param bool $anonymous
     */
    public function setAnonymous(bool $anonymous): void
    {
        $this->anonymous = $anonymous;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $phoneNumber
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string|null
     */
    public function getSex(): ?string
    {
        return $this->sex;
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

    /**
     * @return array|Segment[]
     */
    public function getSegments(): array
    {
        return $this->segments;
    }

    /**
     * @param array|Segment[] $segments
     */
    public function setSegments(array $segments): void
    {
        $this->segments = $segments;
    }

    /**
     * @return array|Event[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * @param array|Event[] $events
     */
    public function setEvents(array $events): void
    {
        $this->events = $events;
    }

    /**
     * @return array|PageEvent[]
     */
    public function getPageEvents(): array
    {
        return $this->pageEvents;
    }

    /**
     * @param array|PageEvent[] $pageEvents
     */
    public function setPageEvents(array $pageEvents): void
    {
        $this->pageEvents = $pageEvents;
    }
}