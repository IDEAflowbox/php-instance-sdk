<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Segment;
use Cyberkonsultant\DTO\Segment\Parameter;

/**
 * Class SegmentBuilder
 *
 * @package Cyberkonsultant
 */
class SegmentBuilder implements SegmentBuilderInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array|Parameter[]
     */
    protected $parameters = [];

    /**
     * @var string
     */
    protected $color;

    /**
     * @var int
     */
    protected $countUsers;

    /**
     * @var string
     */
    protected $status;

    /**
     * @param string $name
     * @return SegmentBuilderInterface
     */
    public function setName(string $name): SegmentBuilderInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param array $parameters
     * @return SegmentBuilderInterface
     */
    public function setParameters(array $parameters): SegmentBuilderInterface
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @param Parameter $parameter
     * @return SegmentBuilderInterface
     */
    public function addParameter(Parameter $parameter): SegmentBuilderInterface
    {
        $this->parameters[] = $parameter;
        return $this;
    }

    /**
     * @param string $color
     * @return SegmentBuilderInterface
     */
    public function setColor(string $color): SegmentBuilderInterface
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param int $countUsers
     * @return SegmentBuilderInterface
     */
    public function setCountUsers(int $countUsers): SegmentBuilderInterface
    {
        $this->countUsers = $countUsers;
        return $this;
    }

    /**
     * @param string $status
     * @return SegmentBuilderInterface
     */
    public function setStatus(string $status): SegmentBuilderInterface
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Segment
     */
    public function getResult(): Segment
    {
        $segment = new Segment();
        $segment->setName($this->name);
        $segment->setParameters($this->parameters);
        $segment->setColor($this->color);
        $segment->setCountUsers($this->countUsers);
        $segment->setStatus($this->status);

        return $segment;
    }
}