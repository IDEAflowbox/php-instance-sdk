<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\PaginationResponseAssembler;
use Cyberkonsultant\Assembler\SegmentAssembler;
use Cyberkonsultant\DTO\Segment;
use Cyberkonsultant\Model\ListResponse;

/**
 * Class SegmentCRUD
 *
 * @package Cyberkonsultant
 */
class SegmentCRUD extends BaseCRUD
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
        $response = $this->cyberkonsultant->get('/crm/segments', ['query' => $query]);
        $assembler = new PaginationResponseAssembler();
        $segmentAssembler = new SegmentAssembler();

        return $assembler->writeDTO(
            $this->cyberkonsultant->parseResponse($response),
            static function (array $data) use ($segmentAssembler) {
                return $segmentAssembler->writeDTO($data);
            }
        );
    }

    /**
     * @param string $id
     * @return Segment
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function find(string $id): Segment
    {
        $response = $this->cyberkonsultant->get(sprintf('/crm/segments/%s', $id));
        return $this->cyberkonsultant->getEdgeResponse($response, SegmentAssembler::class);
    }

    /**
     * @param string $id
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function delete(string $id): void
    {
        $this->cyberkonsultant->delete(sprintf('/crm/segments/%s', $id));
    }

    /**
     * @param Segment $segment
     * @return Segment
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function create(Segment $segment): Segment
    {
        $segmentAssembler = new SegmentAssembler();
        $response = $this->cyberkonsultant->post('/crm/segments', [
            'json' => $segmentAssembler->readDTO($segment)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SegmentAssembler::class);
    }

    /**
     * @param Segment $segment
     * @return mixed
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function update(Segment $segment)
    {
        $segmentAssembler = new SegmentAssembler();
        $response = $this->cyberkonsultant->put(sprintf('/shop/segments/%s', $segment->getId()), [
            'json' => $segmentAssembler->readDTO($segment)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SegmentAssembler::class);
    }
}