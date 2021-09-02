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

    //public function find(string $id): RecommendationFrame
    //{
    //
    //}
}