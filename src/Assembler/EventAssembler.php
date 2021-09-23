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
            'category_id' => $eventDTO->getCategoryId(),
            'cart_id' => $eventDTO->getCartId(),
            'price' => $eventDTO->getPrice(),
        ];
    }

    /**
     * @param array $event
     * @return Event
     */
    public function writeDTO(array $event): Event
    {
        $eventTime = strtotime($event['event_time']);
        return new Event(
            $event['id'],
            $event['user_id'],
            $eventTime ? (new \DateTime())->setTimestamp($eventTime) : null,
            $event['event_type'],
            $event['user_score'],
            $event['product_id'],
            $event['category_id'],
            $event['cart_id'],
            $event['price']
        );
    }
}