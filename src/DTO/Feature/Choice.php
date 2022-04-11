<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\Feature;

/**
 * Class Choice
 *
 * @package Cyberkonsultant
 */
class Choice
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $associatedTo = null;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getAssociatedTo(): ?string
    {
        return $this->associatedTo;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string|null $associatedTo
     */
    public function setAssociatedTo(?string $associatedTo): void
    {
        $this->associatedTo = $associatedTo;
    }
}