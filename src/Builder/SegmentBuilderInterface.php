<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Segment;
use Cyberkonsultant\DTO\Segment\Parameter;

/**
 * Interface SegmentBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface SegmentBuilderInterface
{
    /**
     * @param string $name
     * @return SegmentBuilderInterface
     */
    public function setName(string $name): SegmentBuilderInterface;

    /**
     * @param array $parameters
     * @return SegmentBuilderInterface
     */
    public function setParameters(array $parameters): SegmentBuilderInterface;

    /**
     * @param Parameter $parameter
     * @return SegmentBuilderInterface
     */
    public function addParameter(Parameter $parameter): SegmentBuilderInterface;

    /**
     * @param string $color
     * @return SegmentBuilderInterface
     */
    public function setColor(string $color): SegmentBuilderInterface;

    /**
     * @param int $countUsers
     * @return SegmentBuilderInterface
     */
    public function setCountUsers(int $countUsers): SegmentBuilderInterface;

    /**
     * @param string $status
     * @return SegmentBuilderInterface
     */
    public function setStatus(string $status): SegmentBuilderInterface;

    /**
     * @return Segment
     */
    public function getResult(): Segment;
}