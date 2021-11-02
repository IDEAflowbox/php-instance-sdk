<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\Message;
use Cyberkonsultant\Utils\DateTimeFormat;

/**
 * Class MessageAssembler
 *
 * @package Cyberkonsultant
 */
class MessageAssembler implements DataAssemblerInterface
{
    /**
     * @param Message $messageDTO
     * @return array
     */
    public function readDTO(Message $messageDTO): array
    {
        return [
            'id' => $messageDTO->getId(),
            'name' => $messageDTO->getName(),
            'title' => $messageDTO->getTitle(),
            'start_date' => $messageDTO->getStartDate() ? $messageDTO->getStartDate()->format(DateTimeFormat::ZULU) : null,
            'segment_id' => $messageDTO->getSegmentId(),
            'sender_id' => $messageDTO->getSenderId(),
            'contents' => $messageDTO->getContents(),
            'utm_campaign' => $messageDTO->getUtmCampaign(),
            'status' => $messageDTO->getStatus(),
            'outbound' => $messageDTO->getOutbound(),
            'reach' => $messageDTO->getReach(),
        ];
    }

    /**
     * @param array $message
     * @return Message
     */
    public function writeDTO(array $message): Message
    {
        $startDate = strtotime($message['start_date']);
        $messageDTO = new Message();
        $messageDTO->setName($message['name']);
        $messageDTO->setTitle($message['title']);
        if ($startDate) {
            $messageDTO->setStartDate((new \DateTime())->setTimestamp($startDate));
        }
        $messageDTO->setSegmentId($message['segment_id']);
        $messageDTO->setSenderId($message['sender_id']);
        $messageDTO->setContents($message['contents']);
        $messageDTO->setUtmCampaign($message['utm_campaign']);
        $messageDTO->setStatus($message['status']);
        $messageDTO->setOutbound($message['outbound']);
        $messageDTO->setReach($message['reach']);

        return $messageDTO;
    }
}