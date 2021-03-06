<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\Group;

use Cyberkonsultant\DTO\Group\Filter;

/**
 * Class FilterAssembler
 *
 * @package Cyberkonsultant
 */
class FilterAssembler
{
    /**
     * @param Filter $filterDTO
     * @return array
     */
    public function readDTO(Filter $filterDTO): array
    {
        return [
            'field' => $filterDTO->getField(),
            'operator' => $filterDTO->getOperator(),
            'value' => $filterDTO->getValue(),
        ];
    }

    /**
     * @param array $filter
     * @return Filter
     */
    public function writeDTO(array $filter): Filter
    {
        $filterDTO = new Filter();
        $filterDTO->setField($filter['field']);
        $filterDTO->setOperator($filter['operator']);
        $filterDTO->setValue($filter['value']);
        return $filterDTO;
    }
}