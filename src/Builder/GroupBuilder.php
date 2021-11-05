<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\Builder\Group\CriteriaBuilder;
use Cyberkonsultant\Builder\Group\CriteriaBuilderInterface;
use Cyberkonsultant\DTO\Group;

/**
 * Class GroupBuilder
 *
 * @package Cyberkonsultant
 */
class GroupBuilder implements GroupBuilderInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var CriteriaBuilderInterface
     */
    protected $criteriaBuilder;

    /**
     * GroupBuilder constructor.
     */
    public function __construct()
    {
        $this->criteriaBuilder = new CriteriaBuilder($this);
    }

    /**
     * @param string $name
     * @return GroupBuilderInterface
     */
    public function setName(string $name): GroupBuilderInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return CriteriaBuilderInterface
     */
    public function getCriteriaBuilder(): CriteriaBuilderInterface
    {
        return $this->criteriaBuilder;
    }

    /**
     * @return Group
     */
    public function getResult(): Group
    {
        $group = new Group();
        $group->setName($this->name);
        $group->setCriteria($this->criteriaBuilder->getResult());
        return $group;
    }
}