<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\Call;
use Cyberkonsultant\DTO\Event;

/**
 * Class EventAssembler
 *
 * @package Cyberkonsultant
 */
class CallAssembler implements DataAssemblerInterface
{
    /**
     * @param Call $callDTO
     * @return array
     */
    public function readDTO(Call $callDTO): array
    {
        return [
            'id' => $callDTO->getId(),
            'order_number' => $callDTO->getOrderNumber(),
            'caller_number' => $callDTO->getCallerNumber(),
            'processed' => $callDTO->isProcessed(),
        ];
    }

    /**
     * @param array $call
     * @return Call
     */
    public function writeDTO(array $call): Call
    {
        $callDto = new Call();
        if (isset($call['id'])) {
            $callDto->setId($call['id']);
        }
        $callDto->setOrderNumber($call['order_number']);
        $callDto->setCallerNumber($call['caller_number']);
        $callDto->setProcessed($call['processed']);
        return $callDto;
    }
}