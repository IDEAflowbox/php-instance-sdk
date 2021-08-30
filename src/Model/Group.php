<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

class Group
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var Criteria
     */
    public $criteria;

    /**
     * @var string
     */
    public $created_at;

    /**
     * @var string
     */
    public $updated_at;

    public static function create(string $name, Criteria $criteria): self
    {
        $group = new self();
        $group->name = $name;
        $group->criteria = $criteria;
        return $group;
    }
}