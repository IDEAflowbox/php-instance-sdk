<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

use Cyberkonsultant\DTO\Feature\Choice;

/**
 * Class Feature
 *
 * @package Cyberkonsultant
 */
class Feature
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
     * @var Choice[]
     */
    protected $choices;

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
     * @return Choice[]
     */
    public function getChoices(): array
    {
        return $this->choices;
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
     * @param Choice[] $choices
     */
    public function setChoices(array $choices): void
    {
        $this->choices = $choices;
    }
}