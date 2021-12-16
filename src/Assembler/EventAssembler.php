<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\Event;
use Cyberkonsultant\Utils\DateTimeFormat;

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
            'event_time' => $eventDTO->getEventTime() ? $eventDTO->getEventTime()->format(DateTimeFormat::ZULU) : null,
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
        $eventDTO = new Event();
        $eventDTO->setId($event['id']);
        $eventDTO->setUserId($event['user_id']);
        $eventDTO->setEventType($event['event_type']);
        $eventDTO->setUserScore($event['user_score']);
        $eventDTO->setProductId($event['product_id']);
        $eventDTO->setCategoryId($event['category_id']);
        $eventDTO->setCartId($event['cart_id']);
        $eventDTO->setPrice($event['price']);
        if ($eventTime) {
            $eventDTO->setEventTime((new \DateTime())->setTimestamp($eventTime));
        }
        return $eventDTO;
    }
}