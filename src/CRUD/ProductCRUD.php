<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\PaginationResponseAssembler;
use Cyberkonsultant\Assembler\ProductAssembler;
use Cyberkonsultant\Assembler\SuccessResponseAssembler;
use Cyberkonsultant\DTO\Product;
use Cyberkonsultant\DTO\SuccessResponse;
use Cyberkonsultant\Model\ListResponse;

/**
 * Class ProductCRUD
 *
 * @package Cyberkonsultant
 */
class ProductCRUD extends BaseCRUD
{
    /**
     * @param array $query
     * @return ListResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(array $query = []): ListResponse
    {
        $response = $this->cyberkonsultant->get('/shop/feed', ['query' => $query]);
        $assembler = new PaginationResponseAssembler();
        $productAssembler = new ProductAssembler();

        return $assembler->writeDTO(
            $this->cyberkonsultant->parseResponse($response),
            static function (array $data) use ($productAssembler) {
                return $productAssembler->writeDTO($data);
            }
        );
    }

    /**
     * @param Product $product
     * @return SuccessResponse
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(Product $product): SuccessResponse
    {
        $productAssembler = new ProductAssembler();
        $response = $this->cyberkonsultant->post('/shop/feed', [
            'json' => [$productAssembler->readDTO($product)]
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SuccessResponseAssembler::class);
    }

    /**
     * @param array $products
     * @return Product
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createMany(array $products): SuccessResponse
    {
        $productAssembler = new ProductAssembler();
        $response = $this->cyberkonsultant->post('/shop/feed', [
            'json' => array_map(static function($product) use ($productAssembler) {
                return $productAssembler->readDTO($product);
            }, $products)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SuccessResponseAssembler::class);
    }
}