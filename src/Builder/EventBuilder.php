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
     * @var string|null
     */
    protected $categoryId;

    /**
     * @var string|null
     */
    protected $cartId;

    /**
     * @var string|null
     */
    protected $frameId;

    /**
     * @var \DateTime|null
     */
    protected $eventTime;

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
     * @param string|null $categoryId
     * @return EventBuilderInterface
     */
    public function setCategoryId(?string $categoryId): EventBuilderInterface
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @param string $cartId
     * @return EventBuilderInterface
     */
    public function setCartId(string $cartId): EventBuilderInterface
    {
        $this->cartId = $cartId;
        return $this;
    }

    /**
     * @param string $frameId
     * @return EventBuilderInterface
     */
    public function setFrameId(string $frameId): EventBuilderInterface
    {
        $this->frameId = $frameId;
        return $this;
    }


    /**
     * @return \DateTime|null
     */
    public function getEventTime(): ?\DateTime
    {
        return $this->eventTime;
    }

    /**
     * @param \DateTime|null $eventTime
     * @return EventBuilderInterface
     */
    public function setEventTime(?\DateTime $eventTime = null): EventBuilderInterface
    {
        $this->eventTime = $eventTime;
        return $this;
    }

    /**
     * @return Event
     */
    public function getResult(): Event
    {
        $event = new Event();
        $event->setUserId($this->userId);
        $event->setEventType($this->type);
        $event->setProductId($this->productId);
        $event->setCategoryId($this->categoryId);
        $event->setCartId($this->cartId);
        $event->setFrameId($this->frameId);
        $event->setPrice($this->price);
        $event->setEventTime($this->eventTime);
        return $event;
    }
}