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
     * Category constructor.
     * @param string $id
     * @param string $name
     * @param Choice[] $choices
     */
    public function __construct(
        string $id,
        string $name,
        array $choices
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->choices = $choices;
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
     * @return Choice[]
     */
    public function getChoices(): array
    {
        return $this->choices;
    }
}