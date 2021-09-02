<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;


use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Matrix;

class MatrixAssembler
{
    public function readDTO(Matrix $matrixDTO): array
    {
        return [
            'columns' => $matrixDTO->getColumns(),
            'rows' => $matrixDTO->getRows(),
        ];
    }

    public function writeDTO(array $matrix): Matrix
    {
        return new Matrix(
            $matrix['columns'],
            $matrix['rows']
        );
    }
}