<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

use Cyberkonsultant\DTO\Segment\Parameter;

/**
 * Class Segment
 *
 * @package Cyberkonsultant
 */
class Segment
{
    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array|Parameter[]
     */
    protected $parameters = [];

    /**
     * @var string
     */
    protected $color;

    /**
     * @var array|User[]
     */
    protected $users = [];

    /**
     * @var int
     */
    protected $countUsers;

    /**
     * @var string
     */
    protected $status;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array|Parameter[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param array|Parameter[] $parameters
     */
    public function setParameters(array $parameters): void
    {
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return array|User[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param array|User[] $users
     */
    public function setUsers(array $users): void
    {
        $this->users = $users;
    }

    /**
     * @return int
     */
    public function getCountUsers(): int
    {
        return $this->countUsers;
    }

    /**
     * @param int|null $countUsers
     */
    public function setCountUsers(?int $countUsers = 0): void
    {
        $this->countUsers = $countUsers ?: 0;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status = null): void
    {
        $this->status = $status ?: "";
    }
}