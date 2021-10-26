<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\Segment;

use Cyberkonsultant\DTO\Segment\Parameter;

/**
 * Class ParameterAssembler
 *
 * @package Cyberkonsultant
 */
class ParameterAssembler
{
    /**
     * @param Parameter $parameterDTO
     * @return array
     */
    public function readDTO(Parameter $parameterDTO): array
    {
        return [
            'type' => $parameterDTO->getType(),
            'operator' => $parameterDTO->getOperator(),
            'value' => $parameterDTO->getValue(),
        ];
    }

    /**
     * @param array $parameter
     * @return Parameter
     */
    public function writeDTO(array $parameter): Parameter
    {
        $parameterDTO = new Parameter();
        $parameterDTO->setType($parameter['type']);
        $parameterDTO->setOperator($parameter['operator']);
        $parameterDTO->setValue($parameter['value']);

        return $parameterDTO;
    }
}