<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\MessageAssembler;
use Cyberkonsultant\Assembler\PaginationResponseAssembler;
use Cyberkonsultant\DTO\Message;
use Cyberkonsultant\Model\ListResponse;

/**
 * Class MessageCRUD
 *
 * @package Cyberkonsultant
 */
class MessageCRUD extends BaseCRUD
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
        $response = $this->cyberkonsultant->get('/crm/mailer/messages', ['query' => $query]);
        $assembler = new PaginationResponseAssembler();
        $messageAssembler = new MessageAssembler();

        return $assembler->writeDTO(
            $this->cyberkonsultant->parseResponse($response),
            static function (array $data) use ($messageAssembler) {
                return $messageAssembler->writeDTO($data);
            }
        );
    }

    /**
     * @param string $id
     * @return Message
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function find(string $id): Message
    {
        $response = $this->cyberkonsultant->get(sprintf('/crm/mailer/messages/%s', $id));
        return $this->cyberkonsultant->getEdgeResponse($response, MessageAssembler::class);
    }

    /**
     * @param Message $message
     * @return Message
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function create(Message $message): Message
    {
        $messageAssembler = new MessageAssembler();
        $response = $this->cyberkonsultant->post('/crm/mailer/messages', [
            'json' => $messageAssembler->readDTO($message)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, MessageAssembler::class);
    }

    /**
     * @param Message $message
     * @return Message
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function export(string $messageId): string
    {
        $response = $this->cyberkonsultant->get(
            sprintf('/crm/mailer/messages/%s/export', $messageId)
        );

        return $response->raw_body;
    }

    /**
     * @param string $messageId
     * @return Message
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function cancel(string $messageId): Message
    {
        $response = $this->cyberkonsultant->patch(
            sprintf('/crm/mailer/messages/%s/cancel', $messageId)
        );

        return $this->cyberkonsultant->getEdgeResponse($response, MessageAssembler::class);
    }
}