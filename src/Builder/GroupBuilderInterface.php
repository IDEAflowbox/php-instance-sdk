<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\Builder\Group\CriteriaBuilderInterface;
use Cyberkonsultant\DTO\Group;

/**
 * Interface GroupBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface GroupBuilderInterface
{
    /**
     * @param string $name
     * @return GroupBuilderInterface
     */
    public function setName(string $name): GroupBuilderInterface;

    /**
     * @param bool $exclude
     * @return GroupBuilderInterface
     */
    public function setExcludeUncategorized(bool $exclude): GroupBuilderInterface;

    /**
     * @return CriteriaBuilderInterface
     */
    public function getCriteriaBuilder(): CriteriaBuilderInterface;

    /**
     * @return Group
     */
    public function getResult(): Group;
}