<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Matrix;

/**
 * Class MatrixAssembler
 *
 * @package Cyberkonsultant
 */
class MatrixAssembler
{
    /**
     * @param Matrix $matrixDTO
     * @return array
     */
    public function readDTO(Matrix $matrixDTO): array
    {
        return [
            'columns' => $matrixDTO->getColumns(),
            'rows' => $matrixDTO->getRows(),
        ];
    }

    /**
     * @param array $matrix
     * @return Matrix
     */
    public function writeDTO(array $matrix): Matrix
    {
        return new Matrix(
            $matrix['columns'],
            $matrix['rows']
        );
    }
}