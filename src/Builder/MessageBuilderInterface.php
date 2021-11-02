<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Message;
use Cyberkonsultant\DTO\SenderWithCredentials;

/**
 * Interface MessageBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface MessageBuilderInterface
{
    /**
     * @param string $name
     * @return MessageBuilderInterface
     */
    public function setName(string $name): MessageBuilderInterface;

    /**
     * @param string $title
     * @return MessageBuilderInterface
     */
    public function setTitle(string $title): MessageBuilderInterface;

    /**
     * @param \DateTime $startDate
     * @return MessageBuilderInterface
     */
    public function setStartDate(\DateTime $startDate): MessageBuilderInterface;

    /**
     * @param string $segmentId
     * @return MessageBuilderInterface
     */
    public function setSegmentId(string $segmentId): MessageBuilderInterface;

    /**
     * @param string $senderId
     * @return MessageBuilderInterface
     */
    public function setSenderId(string $senderId): MessageBuilderInterface;

    /**
     * @param string $contents
     * @return MessageBuilderInterface
     */
    public function setContents(string $contents): MessageBuilderInterface;

    /**
     * @param string $utmCampaign
     * @return MessageBuilderInterface
     */
    public function setUtmCampaign(string $utmCampaign): MessageBuilderInterface;

    /**
     * @return Message
     */
    public function getResult(): Message;
}