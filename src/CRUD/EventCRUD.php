<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\EventAssembler;
use Cyberkonsultant\Assembler\PaginationResponseAssembler;
use Cyberkonsultant\DTO\Event;
use Cyberkonsultant\Model\ListResponse;

/**
 * Class EventCRUD
 *
 * @package Cyberkonsultant
 */
class EventCRUD extends BaseCRUD
{
    /**
     * @param array $query
     * @return ListResponse
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function get(array $query = []): ListResponse
    {
        $response = $this->cyberkonsultant->get('/shop/events', ['query' => $query]);
        $assembler = new PaginationResponseAssembler();
        $eventAssembler = new EventAssembler();

        return $assembler->writeDTO(
            $this->cyberkonsultant->parseResponse($response),
            static function (array $data) use ($eventAssembler) {
                return $eventAssembler->writeDTO($data);
            }
        );
    }

    /**
     * @param Event $event
     * @return Event
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function create(Event $event): Event
    {
        $eventAssembler = new EventAssembler();
        $response = $this->cyberkonsultant->post('/shop/events', [
            'json' => $eventAssembler->readDTO($event)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, EventAssembler::class);
    }

    /**
     * @param array<Event> $event
     * @return void
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function createBatch(array $events): void
    {
        $eventAssembler = new EventAssembler();
        $this->cyberkonsultant->post('/shop/events/batch', [
            'json' => array_map(function (Event $event) use ($eventAssembler) {
                return $eventAssembler->readDTO($event);
            }, $events)
        ]);
    }
}