<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\PageEvent;

/**
 * Class PageEventBuilder
 *
 * @package Cyberkonsultant
 */
class PageEventBuilder implements PageEventBuilderInterface
{
    /**
     * @var string
     */
    protected $userId;

    /**
     * @var string|null
     */
    protected $productId;

    /**
     * @var string|null
     */
    protected $frameId;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var \DateTime|null
     */
    protected $eventTime;

    /**
     * @param string $userId
     * @return PageEventBuilderInterface
     */
    public function setUserId(string $userId): PageEventBuilderInterface
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @param string|null $productId
     * @return PageEventBuilderInterface
     */
    public function setProductId(?string $productId): PageEventBuilderInterface
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @param string|null $frameId
     * @return PageEventBuilderInterface
     */
    public function setFrameId(?string $frameId): PageEventBuilderInterface
    {
        $this->frameId = $frameId;
        return $this;
    }

    /**
     * @param string $type
     * @return PageEventBuilderInterface
     */
    public function setType(string $type): PageEventBuilderInterface
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $url
     * @return PageEventBuilderInterface
     */
    public function setUrl(string $url): PageEventBuilderInterface
    {
        $this->url = $url;
        return $this;
    }


    /**
     * @param \DateTime|null $eventTime
     * @return PageEventBuilderInterface
     */
    public function setEventTime(?\DateTime $eventTime = null): PageEventBuilderInterface
    {
        $this->eventTime = $ventTime;
        return $this;
    }

    /**
     * @return PageEvent
     */
    public function getResult(): PageEvent
    {
        $pageEvent = new PageEvent();
        $pageEvent->setUserId($this->userId);
        $pageEvent->setEventType($this->type);
        $pageEvent->setProductId($this->productId);
        $pageEvent->setFrameId($this->frameId);
        $pageEvent->setUrl($this->url);
        $pageEvent->setEventTime($this->eventTime);

        return $pageEvent;
    }
}