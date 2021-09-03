<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\Assembler\Group\CriteriaAssembler;
use Cyberkonsultant\DTO\Group;

/**
 * Class GroupAssembler
 *
 * @package Cyberkonsultant
 */
class GroupAssembler implements DataAssemblerInterface
{
    /**
     * @var CriteriaAssembler
     */
    protected $criteriaAssembler;

    /**
     * GroupAssembler constructor.
     */
    public function __construct()
    {
        $this->criteriaAssembler = new CriteriaAssembler();
    }

    /**
     * @param Group $groupDTO
     * @return array
     */
    public function readDTO(Group $groupDTO): array
    {
        return [
            'id' => $groupDTO->getId(),
            'name' => $groupDTO->getName(),
            'criteria' => $this->criteriaAssembler->readDTO($groupDTO->getCriteria())
        ];
    }

    /**
     * @param array $group
     * @return Group
     */
    public function writeDTO(array $group): Group
    {
        return new Group(
            $group['id'],
            $group['name'],
            $this->criteriaAssembler->writeDTO($group['criteria'])
        );
    }
}