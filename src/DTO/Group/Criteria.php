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
    protected $filters = [];

    /**
     * @param Filter[] $filters
     */
    public function setFilters(array $filters): void
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