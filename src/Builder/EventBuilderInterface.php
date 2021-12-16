<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Event;

/**
 * Interface EventBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface EventBuilderInterface
{
    /**
     * @param string $userId
     * @return EventBuilderInterface
     */
    public function setUserId(string $userId): EventBuilderInterface;

    /**
     * @param string $productId
     * @return EventBuilderInterface
     */
    public function setProductId(string $productId): EventBuilderInterface;

    /**
     * @param string $type
     * @return EventBuilderInterface
     */
    public function setType(string $type): EventBuilderInterface;

    /**
     * @param float $price
     * @return EventBuilderInterface
     */
    public function setPrice(float $price): EventBuilderInterface;

    /**
     * @param string $categoryId
     * @return EventBuilderInterface
     */
    public function setCategoryId(string $categoryId): EventBuilderInterface;

    /**
     * @param string $cartId
     * @return EventBuilderInterface
     */
    public function setCartId(string $cartId): EventBuilderInterface;

    /**
     * @param \DateTime|null $eventTime
     * @return EventBuilderInterface
     */
    public function setEventTime(?\DateTime $eventTime = null): EventBuilderInterface;

    /**
     * @return Event
     */
    public function getResult(): Event;
}