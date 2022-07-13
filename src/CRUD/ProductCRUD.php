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
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function get(array $query = []): ListResponse
    {
        $response = $this->cyberkonsultant->get('/shop/products', ['query' => $query]);
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
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     * @deprecated since version 1.5.5, will be removed since 1.6.0. Use ProductsTransactionCRUD.
     */
    public function create(Product $product): SuccessResponse
    {
        $productAssembler = new ProductAssembler();
        $json = $productAssembler->readDTO($product);
        $json['categories'] = array_map(static function ($category) {
            return $category['id'];
        }, $json['categories']);

        $response = $this->cyberkonsultant->post('/shop/products', [
            'json' => [$json]
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SuccessResponseAssembler::class);
    }

    /**
     * @param array $products
     * @return SuccessResponse
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     * @deprecated since version 1.5.5, will be removed since 1.6.0. Use ProductsTransactionCRUD.
     */
    public function createMany(array $products): SuccessResponse
    {
        $productAssembler = new ProductAssembler();
        $response = $this->cyberkonsultant->post('/shop/products', [
            'json' => array_map(static function($product) use ($productAssembler) {
                $json = $productAssembler->readDTO($product);
                $json['categories'] = array_map(static function ($category) {
                    return $category['id'];
                }, $json['categories']);

                return $json;
            }, $products)
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SuccessResponseAssembler::class);
    }
}