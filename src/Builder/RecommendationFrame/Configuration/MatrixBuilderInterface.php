<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Matrix;

interface MatrixBuilderInterface
{
    public function setColumns(int $columns): MatrixBuilderInterface;
    public function setRows(int $rows): MatrixBuilderInterface;
    public function getResult(): Matrix;
    public function endMatrixBuilder(): ConfigurationBuilderInterface;
}