<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\Segment;

use Cyberkonsultant\DTO\Segment\Parameter;

class ParameterBuilder implements ParameterBuilderInterface
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $operator;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $type
     * @return ParameterBuilderInterface
     */
    public function setType(string $type): ParameterBuilderInterface
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $operator
     * @return ParameterBuilderInterface
     */
    public function setOperator(string $operator): ParameterBuilderInterface
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @param string $value
     * @return ParameterBuilderInterface
     */
    public function setValue(string $value): ParameterBuilderInterface
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return Parameter
     */
    public function getResult(): Parameter
    {
        $parameter = new Parameter();
        $parameter->setType($this->type);
        $parameter->setOperator($this->operator);
        $parameter->setValue($this->value);
        return $parameter;
    }
}