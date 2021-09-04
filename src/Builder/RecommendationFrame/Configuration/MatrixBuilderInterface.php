<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Matrix;

/**
 * Interface MatrixBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface MatrixBuilderInterface
{
    /**
     * @param int $columns
     * @return MatrixBuilderInterface
     */
    public function setColumns(int $columns): MatrixBuilderInterface;

    /**
     * @param int $rows
     * @return MatrixBuilderInterface
     */
    public function setRows(int $rows): MatrixBuilderInterface;

    /**
     * @return Matrix
     */
    public function getResult(): Matrix;

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endMatrixBuilder(): ConfigurationBuilderInterface;
}