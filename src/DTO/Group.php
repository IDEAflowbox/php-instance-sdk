<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

use Cyberkonsultant\DTO\Group\Criteria;

/**
 * Class Group
 *
 * @package Cyberkonsultant
 */
class Group
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
     * @var Criteria
     */
    protected $criteria;

    /**
     * Group constructor.
     * @param string|null $id
     * @param string $name
     * @param Criteria $criteria
     */
    public function __construct(
        ?string $id,
        string $name,
        Criteria $criteria
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->criteria = $criteria;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
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
     * @return Criteria
     */
    public function getCriteria(): Criteria
    {
        return $this->criteria;
    }
}