<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Message;

/**
 * Class MessageBuilder
 *
 * @package Cyberkonsultant
 */
class MessageBuilder implements MessageBuilderInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @var string
     */
    protected $segmentId;

    /**
     * @var string
     */
    protected $senderId;

    /**
     * @var string
     */
    protected $contents;

    /**
     * @var string
     */
    protected $utmCampaign;

    /**
     * @param string $name
     * @return MessageBuilderInterface
     */
    public function setName(string $name): MessageBuilderInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $title
     * @return MessageBuilderInterface
     */
    public function setTitle(string $title): MessageBuilderInterface
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param \DateTime $startDate
     * @return MessageBuilderInterface
     */
    public function setStartDate(\DateTime $startDate): MessageBuilderInterface
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @param string $segmentId
     * @return MessageBuilderInterface
     */
    public function setSegmentId(string $segmentId): MessageBuilderInterface
    {
        $this->segmentId = $segmentId;
        return $this;
    }

    /**
     * @param string $senderId
     * @return MessageBuilderInterface
     */
    public function setSenderId(string $senderId): MessageBuilderInterface
    {
        $this->senderId = $senderId;
        return $this;
    }

    /**
     * @param string $contents
     * @return MessageBuilderInterface
     */
    public function setContents(string $contents): MessageBuilderInterface
    {
        $this->contents = $contents;
        return $this;
    }

    /**
     * @param string $utmCampaign
     * @return MessageBuilderInterface
     */
    public function setUtmCampaign(string $utmCampaign): MessageBuilderInterface
    {
        $this->utmCampaign = $utmCampaign;
        return $this;
    }

    /**
     * @return Message
     */
    public function getResult(): Message
    {
        $message = new Message();
        $message->setName($this->name);
        $message->setTitle($this->title);
        $message->setStartDate($this->startDate);
        $message->setSegmentId($this->segmentId);
        $message->setSenderId($this->senderId);
        $message->setContents($this->contents);
        $message->setUtmCampaign($this->utmCampaign);
        return $message;
    }
}