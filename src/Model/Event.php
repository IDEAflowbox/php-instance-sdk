<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

class Event
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $user_id;

    /**
     * @var string
     */
    public $event_time;

    /**
     * @var string
     */
    public $event_type;

    /**
     * @var string
     */
    public $user_score;

    /**
     * @var string
     */
    public $product_id;

    /**
     * @var string
     */
    public $price;

    public static function create(
        string $eventType,
        string $productId,
        string $userId,
        float $price
    ): self {
        $event = new self();
        $event->event_type = $eventType;
        $event->product_id = $productId;
        $event->user_id = $userId;
        $event->price = $price;

        return $event;
    }
}