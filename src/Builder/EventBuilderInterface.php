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
     * @return Event
     */
    public function getResult(): Event;
}