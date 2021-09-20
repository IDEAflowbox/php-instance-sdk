<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\CallAssembler;
use Cyberkonsultant\Assembler\EventAssembler;
use Cyberkonsultant\Assembler\PaginationResponseAssembler;
use Cyberkonsultant\DTO\Call;
use Cyberkonsultant\DTO\Event;
use Cyberkonsultant\Model\ListResponse;

/**
 * Class CallCrud
 *
 * @package Cyberkonsultant
 */
class CallCrud extends BaseCRUD
{
    /**
     * @param array $query
     * @return ListResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(): array
    {
        $response = $this->cyberkonsultant->get('/voice/calls');
        $callAssembler = new CallAssembler();

        return array_map(static function ($call) use ($callAssembler) {
            return $callAssembler->writeDTO($call);
        }, $this->cyberkonsultant->parseResponse($response));
    }

    /**
     * @param Call $event
     * @return Call
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(Call $event): Call
    {
        $callAssembler = new CallAssembler();
        $response = $this->cyberkonsultant->post('/voice/calls', [
            'json' => $callAssembler->readDTO($event)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, CallAssembler::class);
    }

    /**
     * @param string $callId
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function markAsProcessed(string $callId): void
    {
        $this->cyberkonsultant->patch(sprintf('/voice/calls/%s/mark-as-processed', $callId));
    }
}