<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\Group;

/**
 * Class Filter
 *
 * @package Cyberkonsultant
 */
class Filter
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
     * Filter constructor.
     * @param string $field
     * @param string $operator
     * @param string $value
     */
    public function __construct(string $field, string $operator, string $value)
    {
        $this->field = $field;
        $this->operator = $operator;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}