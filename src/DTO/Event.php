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
     * @var string|null
     */
    protected $id;

    /**
     * @var string
     */
    protected $userId;

    /**
     * @var \DateTime|null
     */
    protected $eventTime;

    /**
     * @var string
     */
    protected $eventType;

    /**
     * @var int|null
     */
    protected $userScore;

    /**
     * @var string
     */
    protected $productId;

    /**
     * @var string
     */
    protected $categoryId;

    /**
     * @var string|null
     */
    protected $cartId;

    /**
     * @var float
     */
    protected $price;

    /**
     * Event constructor.
     * @param string|null $id
     * @param string $userId
     * @param \DateTime|null $eventTime
     * @param string $eventType
     * @param int|null $userScore
     * @param string $productId
     * @param string $categoryId
     * @param string|null $cartId
     * @param float $price
     */
    public function __construct(
        ?string $id,
        string $userId,
        ?\DateTime $eventTime,
        string $eventType,
        ?int $userScore,
        string $productId,
        string $categoryId,
        ?string $cartId,
        float $price
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->eventTime = $eventTime;
        $this->eventType = $eventType;
        $this->userScore = $userScore;
        $this->productId = $productId;
        $this->categoryId = $categoryId;
        $this->cartId = $cartId;
        $this->price = $price;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
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
     * @return \DateTime|null
     */
    public function getEventTime(): ?\DateTime
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
     * @return int|null
     */
    public function getUserScore(): ?int
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
     * @return string
     */
    public function getCategoryId(): string
    {
        return $this->categoryId;
    }

    /**
     * @return string|null
     */
    public function getCartId(): ?string
    {
        return $this->cartId;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
}