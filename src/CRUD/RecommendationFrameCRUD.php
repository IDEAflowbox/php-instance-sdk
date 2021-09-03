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
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function find(string $id): RecommendationFrame
    {
        $response = $this->cyberkonsultant->get(sprintf('/shop/frames/%s', $id));
        return $this->cyberkonsultant->getEdgeResponse($response, RecommendationFrameAssembler::class);
    }

    /**
     * @param RecommendationFrame $recommendationFrame
     * @return mixed
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \GuzzleHttp\Exception\GuzzleException
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