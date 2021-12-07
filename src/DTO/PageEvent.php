<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

/**
 * Class PageEvent
 *
 * @package Cyberkonsultant
 */
class PageEvent
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
     * @var string|null
     */
    protected $productId;

    /**
     * @var string|null
     */
    protected $frameId;

    /**
     * @var string|null
     */
    protected $url;

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
     * @param \DateTime $eventTime
     */
    public function setEventTime(\DateTime $eventTime): void
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
     * @return string|null
     */
    public function getProductId(): ?string
    {
        return $this->productId;
    }

    /**
     * @param string|null $productId
     */
    public function setProductId(?string $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @param string|null $frameId
     */
    public function setFrameId(?string $frameId): void
    {
        $this->frameId = $frameId;
    }

    /**
     * @return string|null
     */
    public function getFrameId(): ?string
    {
        return $this->frameId;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }
}