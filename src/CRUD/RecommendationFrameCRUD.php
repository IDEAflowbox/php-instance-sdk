<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\PaginationResponseAssembler;
use Cyberkonsultant\Assembler\RecommendationFrameAssembler;
use Cyberkonsultant\DTO\RecommendationFrame;
use Cyberkonsultant\Model\ListResponse;

/**
 * Class RecommendationFrameCRUD
 *
 * @package Cyberkonsultant
 */
class RecommendationFrameCRUD extends BaseCRUD
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
        $response = $this->cyberkonsultant->get('/shop/frames', ['query' => $query]);
        $assembler = new PaginationResponseAssembler();
        $recommendationFrameAssembler = new RecommendationFrameAssembler();

        return $assembler->writeDTO(
            $this->cyberkonsultant->parseResponse($response),
            static function (array $data) use ($recommendationFrameAssembler) {
                return $recommendationFrameAssembler->writeDTO($data);
            }
        );
    }

    /**
     * @param RecommendationFrame $recommendationFrame
     * @return RecommendationFrame
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function create(RecommendationFrame $recommendationFrame): RecommendationFrame
    {
        $recommendationFrameAssembler = new RecommendationFrameAssembler();
        $response = $this->cyberkonsultant->post('/shop/frames', [
            'json' => $recommendationFrameAssembler->readDTO($recommendationFrame)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, RecommendationFrameAssembler::class);
    }

    /**
     * @param string $id
     * @return RecommendationFrame
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function find(string $id): RecommendationFrame
    {
        $response = $this->cyberkonsultant->get(sprintf('/shop/frames/%s', $id));
        return $this->cyberkonsultant->getEdgeResponse($response, RecommendationFrameAssembler::class);
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
        $this->cyberkonsultant->delete(sprintf('/shop/frames/%s', $id));
    }

    /**
     * @param RecommendationFrame $recommendationFrame
     * @return mixed
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function update(RecommendationFrame $recommendationFrame)
    {
        $recommendationFrameAssembler = new RecommendationFrameAssembler();
        $response = $this->cyberkonsultant->put(sprintf('/shop/frames/%s', $recommendationFrame->getId()), [
            'json' => $recommendationFrameAssembler->readDTO($recommendationFrame)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, RecommendationFrameAssembler::class);
    }
}