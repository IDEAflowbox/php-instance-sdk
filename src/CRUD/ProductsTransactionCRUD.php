<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\PaginationResponseAssembler;
use Cyberkonsultant\Assembler\ProductAssembler;
use Cyberkonsultant\Assembler\ProductsTransactionAssembler;
use Cyberkonsultant\Assembler\SuccessResponseAssembler;
use Cyberkonsultant\DTO\Product;
use Cyberkonsultant\DTO\ProductsTransaction;
use Cyberkonsultant\DTO\SuccessResponse;
use Cyberkonsultant\Model\ListResponse;

/**
 * Class ProductCRUD
 *
 * @package Cyberkonsultant
 */
class ProductsTransactionCRUD extends BaseCRUD
{
    public function beginTransaction(): string
    {
        $response = $this->cyberkonsultant->post('/shop/products/transaction');
        /** @var ProductsTransaction $transaction */
        $transaction = $this->cyberkonsultant->getEdgeResponse($response, ProductsTransactionAssembler::class);
        return $transaction->getId();
    }

    public function append(string $transactionId, array $products): SuccessResponse
    {
        $productAssembler = new ProductAssembler();
        $response = $this->cyberkonsultant->post(
            sprintf('/shop/products/transaction/%s/append', $transactionId), [
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

    public function perform(string $transactionId): SuccessResponse
    {
        $response = $this->cyberkonsultant->post(sprintf(
                '/shop/products/transaction/%s/perform',
                $transactionId
            )
        );
        return $this->cyberkonsultant->getEdgeResponse($response, SuccessResponseAssembler::class);
    }

    public function getTransaction(string $transactionId): ProductsTransaction
    {
        $response = $this->cyberkonsultant->get(sprintf(
            '/shop/products/transaction/%s',
            $transactionId
        ));

        return $this->cyberkonsultant->getEdgeResponse($response, ProductsTransactionAssembler::class);
    }
}