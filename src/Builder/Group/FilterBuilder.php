<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\Group;

use Cyberkonsultant\DTO\Group\Filter;

/**
 * Class FilterBuilder
 *
 * @package Cyberkonsultant
 */
class FilterBuilder implements FilterBuilderInterface
{
    /**
     * @var string
     */
    protected $field;

    /**
     * @var string
     */
    protected $operator;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $field
     * @return FilterBuilderInterface
     */
    public function setField(string $field): FilterBuilderInterface
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @param string $operator
     * @return FilterBuilderInterface
     */
    public function setOperator(string $operator): FilterBuilderInterface
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @param string $value
     * @return FilterBuilderInterface
     */
    public function setValue(string $value): FilterBuilderInterface
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return Filter
     */
    public function getResult(): Filter
    {
        return new Filter(
            $this->field,
            $this->operator,
            $this->value
        );
    }
}