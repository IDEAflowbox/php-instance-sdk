<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\Assembler\Segment\ParameterAssembler;
use Cyberkonsultant\DTO\Segment;
use Cyberkonsultant\DTO\Segment\Parameter;
use Cyberkonsultant\DTO\User;

/**
 * Class PageEventAssembler
 *
 * @package Cyberkonsultant
 */
class SegmentAssembler implements DataAssemblerInterface
{
    /**
     * @var ParameterAssembler
     */
    protected $parameterAssembler;

    /**
     * @var UserAssembler
     */
    protected $userAssembler;

    public function __construct()
    {
        $this->parameterAssembler = new ParameterAssembler();
        $this->userAssembler = new UserAssembler();
    }

    /**
     * @param Segment $segmentDTO
     * @return array
     */
    public function readDTO(Segment $segmentDTO): array
    {
        $parameterAssembler = $this->parameterAssembler;
        $userAssembler = $this->userAssembler;

        return [
            'id' => $segmentDTO->getId(),
            'name' => $segmentDTO->getName(),
            'parameters' => array_map(static function (Parameter $parameter) use ($parameterAssembler) {
                return $parameterAssembler->readDTO($parameter);
            }, $segmentDTO->getParameters()),
            'color' => $segmentDTO->getColor(),
            'users' => array_map(static function (User $user) use ($userAssembler) {
                return $userAssembler->readDTO($user);
            }, $segmentDTO->getUsers()),
            'count_users' => $segmentDTO->getCountUsers(),
            'status' => $segmentDTO->getStatus(),
        ];
    }

    /**
     * @param array $segment
     * @return Segment
     */
    public function writeDTO(array $segment): Segment
    {
        $parameterAssembler = $this->parameterAssembler;
        $userAssembler = $this->userAssembler;

        $segmentDTO = new Segment();
        $segmentDTO->setId($segment['id']);
        $segmentDTO->setName($segment['name']);
        $segmentDTO->setParameters(array_map(
            static function (array $parameter) use ($parameterAssembler) {
                return $parameterAssembler->writeDTO($parameter);
            },
            isset($segment['parameters']) && is_array($segment['parameters']) ? $segment['parameters'] : []
        ));
        $segmentDTO->setColor($segment['color']);
        $segmentDTO->setUsers(array_map(
            static function (array $user) use ($userAssembler) {
                return $userAssembler->writeDTO($user);
            },
            isset($segment['users']) && is_array($segment['users']) ? $segment['users'] : []
        ));
        $segmentDTO->setCountUsers($segment['count_users']);
        $segmentDTO->setStatus($segment['status']);

        return $segmentDTO;
    }
}