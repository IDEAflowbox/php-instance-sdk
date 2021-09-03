<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\Event;

/**
 * Class EventAssembler
 *
 * @package Cyberkonsultant
 */
class EventAssembler implements DataAssemblerInterface
{
    /**
     * @param Event $eventDTO
     * @return array
     */
    public function readDTO(Event $eventDTO): array
    {
        return [
            'id' => $eventDTO->getId(),
            'user_id' => $eventDTO->getUserId(),
            'event_time' => $eventDTO->getEventTime() ? $eventDTO->getEventTime()->format(DATE_ISO8601) : null,
            'event_type' => $eventDTO->getEventType(),
            'user_score' => $eventDTO->getUserScore(),
            'product_id' => $eventDTO->getProductId(),
            'price' => $eventDTO->getPrice(),
        ];
    }

    /**
     * @param array $event
     * @return Event
     */
    public function writeDTO(array $event): Event
    {
        return new Event(
            $event['id'],
            $event['user_id'],
            (new \DateTime())->setTimestamp(strtotime($event['event_time'])),
            $event['event_type'],
            $event['user_score'],
            $event['product_id'],
            $event['price']
        );
    }
}