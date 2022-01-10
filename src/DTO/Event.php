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
    public const VIEW = 'view';
    public const CART = 'cart';
    public const WISHLIST = 'wishlist';
    public const PURCHASE = 'purchase';
    public const RECOMMENDATION_FRAME = 'recommendation_frame';

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
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
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
     */
    public function setEventTime(?\DateTime $eventTime): void
    {
        $this->eventTime = $eventTime;
    }

    /**
     * @return string
     */
    public function getEventType(): string
    {
        return $this->eventType;
    }

    /**
     * @param string $eventType
     */
    public function setEventType(string $eventType): void
    {
        $this->eventType = $eventType;
    }

    /**
     * @return int|null
     */
    public function getUserScore(): ?int
    {
        return $this->userScore;
    }

    /**
     * @param int|null $userScore
     */
    public function setUserScore(?int $userScore): void
    {
        $this->userScore = $userScore;
    }

    /**
     * @return string
     */
    public function getProductId(): string
    {
        return $this->productId;
    }

    /**
     * @param string $productId
     */
    public function setProductId(string $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function getCategoryId(): string
    {
        return $this->categoryId;
    }

    /**
     * @param string $categoryId
     */
    public function setCategoryId(string $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return string|null
     */
    public function getCartId(): ?string
    {
        return $this->cartId;
    }

    /**
     * @param string|null $cartId
     */
    public function setCartId(?string $cartId): void
    {
        $this->cartId = $cartId;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}