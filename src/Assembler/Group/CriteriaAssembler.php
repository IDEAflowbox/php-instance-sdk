<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\Group;

use Cyberkonsultant\DTO\Group\Criteria;

/**
 * Class CriteriaAssembler
 *
 * @package Cyberkonsultant
 */
class CriteriaAssembler
{
    /**
     * @param Criteria $criteriaDTO
     * @return array
     */
    public function readDTO(Criteria $criteriaDTO): array
    {
        return [
            'filters' => $criteriaDTO->getFilters(),
        ];
    }

    /**
     * @param array $criteria
     * @return Criteria
     */
    public function writeDTO(array $criteria): Criteria
    {
        $filterAssembler = new FilterAssembler();
        return new Criteria(
            array_map(static function ($filter) use ($filterAssembler) {
                return $filterAssembler->writeDTO($filter);
            }, $criteria['filters'])
        );
    }
}