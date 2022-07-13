<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\ProductsTransaction;

/**
 * Class ProductsTransactionAssembler
 *
 * @package Cyberkonsultant
 */
class ProductsTransactionAssembler implements DataAssemblerInterface
{
    /**
     * @param ProductsTransaction $productsTransactionDTO
     * @return array
     */
    public function readDTO(ProductsTransaction $productsTransactionDTO): array
    {
        return [
            'id' => $productsTransactionDTO->getId(),
            'status' => $productsTransactionDTO->getStatus(),
            'error' => $productsTransactionDTO->getError(),
        ];
    }

    /**
     * @param array $productsTransaction
     * @return ProductsTransaction
     */
    public function writeDTO(array $productsTransaction): ProductsTransaction
    {
        $productsTransactionDTO = new ProductsTransaction();
        $productsTransactionDTO->setId($productsTransaction['id']);
        $productsTransactionDTO->setStatus($productsTransaction['status']);
        $productsTransactionDTO->setError($productsTransaction['error']);
        return $productsTransactionDTO;
    }
}