<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\Group;

/**
 * Class Criteria
 *
 * @package Cyberkonsultant
 */
class Criteria
{
    /**
     * @var Filter[]
     */
    protected $filters;

    /**
     * Criteria constructor.
     * @param Filter[] $filters
     */
    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return Filter[]
     */
    public function getFilters(): array
    {
        return $this->filters;
    }
}