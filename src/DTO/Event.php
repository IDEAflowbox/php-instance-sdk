<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

/**
 * Class Event
 *
 * @package Cyberkonsultant
 */
class Event
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $userId;

    /**
     * @var \DateTime
     */
    protected $eventTime;

    /**
     * @var string
     */
    protected $eventType;

    /**
     * @var int
     */
    protected $userScore;

    /**
     * @var string
     */
    protected $productId;

    /**
     * @var float
     */
    protected $price;

    /**
     * Event constructor.
     * @param string $id
     * @param string $userId
     * @param \DateTime $eventTime
     * @param string $eventType
     * @param int $userScore
     * @param string $productId
     * @param float $price
     */
    public function __construct(
        string $id,
        string $userId,
        \DateTime $eventTime,
        string $eventType,
        int $userScore,
        string $productId,
        float $price
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->eventTime = $eventTime;
        $this->eventType = $eventType;
        $this->userScore = $userScore;
        $this->productId = $productId;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @return \DateTime
     */
    public function getEventTime(): \DateTime
    {
        return $this->eventTime;
    }

    /**
     * @return string
     */
    public function getEventType(): string
    {
        return $this->eventType;
    }

    /**
     * @return int
     */
    public function getUserScore(): int
    {
        return $this->userScore;
    }

    /**
     * @return string
     */
    public function getProductId(): string
    {
        return $this->productId;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
}