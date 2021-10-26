<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\Segment;

use Cyberkonsultant\DTO\Segment\Parameter;

interface ParameterBuilderInterface
{
    /**
     * @param string $type
     * @return ParameterBuilderInterface
     */
    public function setType(string $type): ParameterBuilderInterface;

    /**
     * @param string $operator
     * @return ParameterBuilderInterface
     */
    public function setOperator(string $operator): ParameterBuilderInterface;

    /**
     * @param string $value
     * @return ParameterBuilderInterface
     */
    public function setValue(string $value): ParameterBuilderInterface;

    /**
     * @return Parameter
     */
    public function getResult(): Parameter;
}