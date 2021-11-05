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
        $filterAssembler = new FilterAssembler();
        return [
            'filters' => array_map(static function ($filter) use ($filterAssembler) {
                return $filterAssembler->readDTO($filter);
            }, $criteriaDTO->getFilters()),
        ];
    }

    /**
     * @param array $criteria
     * @return Criteria
     */
    public function writeDTO(array $criteria): Criteria
    {
        $filterAssembler = new FilterAssembler();
        $criteriaDTO = new Criteria();
        $criteriaDTO->setFilters(array_map(static function ($filter) use ($filterAssembler) {
            return $filterAssembler->writeDTO($filter);
        }, $criteria['filters']));
        return $criteriaDTO;
    }
}