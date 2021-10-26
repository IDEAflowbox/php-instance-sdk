<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\PageEvent;
use Cyberkonsultant\Utils\DateTimeFormat;

/**
 * Class PageEventAssembler
 *
 * @package Cyberkonsultant
 */
class PageEventAssembler implements DataAssemblerInterface
{
    /**
     * @param PageEvent $pageEventDTO
     * @return array
     */
    public function readDTO(PageEvent $pageEventDTO): array
    {
        return [
            'id' => $pageEventDTO->getId(),
            'user_id' => $pageEventDTO->getUserId(),
            'event_time' => $pageEventDTO->getEventTime() ? $pageEventDTO->getEventTime()->format(DateTimeFormat::ZULU) : null,
            'event_type' => $pageEventDTO->getEventType(),
            'product_id' => $pageEventDTO->getProductId(),
            'url' => $pageEventDTO->getUrl(),
        ];
    }

    /**
     * @param array $pageEvent
     * @return PageEvent
     */
    public function writeDTO(array $pageEvent): PageEvent
    {
        $eventTime = strtotime($pageEvent['event_time']);
        $pageEventDTO = new PageEvent();
        $pageEventDTO->setId($pageEvent['id']);
        $pageEventDTO->setUserId($pageEvent['user_id']);
        $pageEventDTO->setEventType($pageEvent['event_type']);
        $pageEventDTO->setProductId($pageEvent['product_id']);
        $pageEventDTO->setUrl($pageEvent['url']);
        if ($eventTime) {
            $pageEventDTO->setEventTime((new \DateTime())->setTimestamp($eventTime));
        }

        return $pageEventDTO;
    }
}