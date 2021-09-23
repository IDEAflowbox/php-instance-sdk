<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\CallAssembler;
use Cyberkonsultant\DTO\Call;
use Cyberkonsultant\Model\ListResponse;

/**
 * Class CallCrud
 *
 * @package Cyberkonsultant
 */
class CallCrud extends BaseCRUD
{
    /**
     * @return array
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
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
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
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
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function markAsProcessed(string $callId): void
    {
        $this->cyberkonsultant->patch(sprintf('/voice/calls/%s/mark-as-processed', $callId));
    }
}