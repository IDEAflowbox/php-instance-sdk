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
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * User constructor.
     * @param string $id
     * @param bool $anonymous
     * @param string|null $username
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $sex
     * @param \DateTime $createdAt
     * @param \DateTime $updatedAt
     */
    public function __construct(
        string $id,
        bool $anonymous,
        ?string $username,
        ?string $firstName,
        ?string $lastName,
        ?string $sex,
        \DateTime $createdAt,
        \DateTime $updatedAt
    ) {
        $this->id = $id;
        $this->anonymous = $anonymous;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->sex = $sex;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
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
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }
}