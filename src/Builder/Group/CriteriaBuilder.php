<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\Group;

use Cyberkonsultant\Builder\GroupBuilderInterface;
use Cyberkonsultant\DTO\Group\Criteria;
use Cyberkonsultant\DTO\Group\Filter;

/**
 * Class CriteriaBuilder
 *
 * @package Cyberkonsultant
 */
class CriteriaBuilder implements CriteriaBuilderInterface
{
    /**
     * @var Filter[]
     */
    protected $filters = [];

    /**
     * @var GroupBuilderInterface
     */
    protected $parent;

    /**
     * CriteriaBuilder constructor.
     * @param GroupBuilderInterface $parent
     */
    public function __construct(GroupBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @param Filter $filter
     * @return CriteriaBuilderInterface
     */
    public function addFilter(Filter $filter): CriteriaBuilderInterface
    {
        $this->filters[] = $filter;
        return $this;
    }

    /**
     * @return Criteria
     */
    public function getResult(): Criteria
    {
        $criteria = new Criteria();
        $criteria->setFilters($this->filters);
        return $criteria;
    }

    /**
     * @return GroupBuilderInterface
     */
    public function endCriteriaBuilder(): GroupBuilderInterface
    {
        return $this->parent;
    }
}