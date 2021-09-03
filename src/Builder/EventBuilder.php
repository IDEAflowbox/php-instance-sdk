<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Event;

/**
 * Class EventBuilder
 *
 * @package Cyberkonsultant
 */
class EventBuilder implements EventBuilderInterface
{
    /**
     * @var string
     */
    protected $userId;

    /**
     * @var string
     */
    protected $productId;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var float
     */
    protected $price;

    /**
     * @param string $userId
     * @return EventBuilderInterface
     */
    public function setUserId(string $userId): EventBuilderInterface
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @param string $productId
     * @return EventBuilderInterface
     */
    public function setProductId(string $productId): EventBuilderInterface
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @param string $type
     * @return EventBuilderInterface
     */
    public function setType(string $type): EventBuilderInterface
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param float $price
     * @return EventBuilderInterface
     */
    public function setPrice(float $price): EventBuilderInterface
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return Event
     */
    public function getResult(): Event
    {
        return new Event(
            null,
            $this->userId,
            null,
            $this->type,
            null,
            $this->productId,
            $this->price
        );
    }
}