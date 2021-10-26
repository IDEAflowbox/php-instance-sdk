<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\PaginationResponseAssembler;
use Cyberkonsultant\Assembler\SenderAssembler;
use Cyberkonsultant\Assembler\SenderWithCredentialsAssembler;
use Cyberkonsultant\Assembler\SuccessResponseAssembler;
use Cyberkonsultant\DTO\Sender;
use Cyberkonsultant\DTO\SenderWithCredentials;
use Cyberkonsultant\DTO\SuccessResponse;
use Cyberkonsultant\Model\ListResponse;

/**
 * Class SenderCRUD
 *
 * @package Cyberkonsultant
 */
class SenderCRUD extends BaseCRUD
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
        $response = $this->cyberkonsultant->get('/crm/mailer/senders', ['query' => $query]);
        $assembler = new PaginationResponseAssembler();
        $senderAssembler = new SenderAssembler();

        return $assembler->writeDTO(
            $this->cyberkonsultant->parseResponse($response),
            static function (array $data) use ($senderAssembler) {
                return $senderAssembler->writeDTO($data);
            }
        );
    }

    /**
     * @param SenderWithCredentials $sender
     * @return Sender
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function create(SenderWithCredentials $sender): Sender
    {
        $senderWithCredentialsAssembler = new SenderWithCredentialsAssembler();
        $response = $this->cyberkonsultant->post('/crm/mailer/senders', [
            'json' => $senderWithCredentialsAssembler->readDTO($sender)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SenderAssembler::class);
    }

    /**
     * @param string $senderId
     * @param int $activationCode
     * @return SuccessResponse
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function activateSender(string $senderId, int $activationCode): SuccessResponse
    {
        $response = $this->cyberkonsultant->put(sprintf(
            '/crm/mailer/senders/%s/activate',
            $senderId
        ), [
            'json' => [
                'activation_code' => $activationCode,
            ]
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SuccessResponseAssembler::class);
    }
}