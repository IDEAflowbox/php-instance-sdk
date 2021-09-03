<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\Group;

use Cyberkonsultant\Builder\GroupBuilderInterface;
use Cyberkonsultant\DTO\Group\Criteria;
use Cyberkonsultant\DTO\Group\Filter;

/**
 * Interface CriteriaBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface CriteriaBuilderInterface
{
    /**
     * @param Filter $filter
     * @return CriteriaBuilderInterface
     */
    public function addFilter(Filter $filter): CriteriaBuilderInterface;

    /**
     * @return Criteria
     */
    public function getResult(): Criteria;

    /**
     * @return GroupBuilderInterface
     */
    public function endCriteriaBuilder(): GroupBuilderInterface;
}