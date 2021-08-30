<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

class Filter
{
    /**
     * @var string
     */
    public $field;

    /**
     * @var string
     */
    public $operator;

    /**
     * @var string
     */
    public $value;

    public static function create(string $field, string $operator, string $value): self
    {
        $filter = new self();
        $filter->field = $field;
        $filter->operator = $operator;
        $filter->value = $value;
        return $filter;
    }
}