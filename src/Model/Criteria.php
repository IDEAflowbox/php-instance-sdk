<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

class Criteria
{
    /**
     * @var Filter[]
     */
    public $filters = [];

    public static function create(array $filters): self
    {
        $criteria = new self();
        $criteria->filters = $filters;
        return $criteria;
    }
}