<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\Group;

use Cyberkonsultant\DTO\Group\Filter;

/**
 * Interface FilterBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface FilterBuilderInterface
{
    /**
     * @param string $field
     * @return FilterBuilderInterface
     */
    public function setField(string $field): FilterBuilderInterface;

    /**
     * @param string $operator
     * @return FilterBuilderInterface
     */
    public function setOperator(string $operator): FilterBuilderInterface;

    /**
     * @param string $value
     * @return FilterBuilderInterface
     */
    public function setValue(string $value): FilterBuilderInterface;

    /**
     * @return Filter
     */
    public function getResult(): Filter;
}