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
     * Filter constructor.
     * @param string $id
     * @param string $name
     * @param string|null $associatedTo
     */
    public function __construct(string $id, string $name, ?string $associatedTo = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->associatedTo = $associatedTo;
    }

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
}