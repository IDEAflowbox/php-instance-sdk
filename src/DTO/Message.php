<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

/**
 * Class Message
 *
 * @package Cyberkonsultant
 */
class Message
{
    /**
     * @var string|null
     */
    protected $id;

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
     * @var string|null
     */
    protected $contents;

    /**
     * @var string|null
     */
    protected $utmCampaign;

    /**
     * @var string|null
     */
    protected $status;

    /**
     * @var int
     */
    protected $reach = 0;

    /**
     * @var int
     */
    protected $outbound = 0;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate(\DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getSegmentId(): string
    {
        return $this->segmentId;
    }

    /**
     * @param string $segmentId
     */
    public function setSegmentId(string $segmentId): void
    {
        $this->segmentId = $segmentId;
    }

    /**
     * @return string
     */
    public function getSenderId(): string
    {
        return $this->senderId;
    }

    /**
     * @param string $senderId
     */
    public function setSenderId(string $senderId): void
    {
        $this->senderId = $senderId;
    }

    /**
     * @return string|null
     */
    public function getContents(): ?string
    {
        return $this->contents;
    }

    /**
     * @param string|null $contents
     */
    public function setContents(?string $contents): void
    {
        $this->contents = $contents;
    }

    /**
     * @return string|null
     */
    public function getUtmCampaign(): ?string
    {
        return $this->utmCampaign;
    }

    /**
     * @param string|null $utmCampaign
     */
    public function setUtmCampaign(?string $utmCampaign): void
    {
        $this->utmCampaign = $utmCampaign;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getReach(): int
    {
        return $this->reach;
    }

    /**
     * @param int $reach
     */
    public function setReach(int $reach): void
    {
        $this->reach = $reach;
    }

    /**
     * @return int
     */
    public function getOutbound(): int
    {
        return $this->outbound;
    }

    /**
     * @param int $outbound
     */
    public function setOutbound(int $outbound): void
    {
        $this->outbound = $outbound;
    }
}