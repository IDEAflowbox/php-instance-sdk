<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Matrix;
use Cyberkonsultant\Exception\CyberkonsultantSDKException;

/**
 * Class MatrixBuilder
 *
 * @package Cyberkonsultant
 */
class MatrixBuilder implements MatrixBuilderInterface
{
    /**
     * @var int
     */
    protected $columns;

    /**
     * @var int
     */
    protected $rows;

    /**
     * @var ConfigurationBuilderInterface
     */
    protected $parent;

    /**
     * MatrixBuilder constructor.
     * @param ConfigurationBuilderInterface $parent
     */
    public function __construct(ConfigurationBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @param int $columns
     * @return MatrixBuilderInterface
     */
    public function setColumns(int $columns): MatrixBuilderInterface
    {
        $this->columns = $columns;
        return $this;
    }

    /**
     * @param int $rows
     * @return MatrixBuilderInterface
     */
    public function setRows(int $rows): MatrixBuilderInterface
    {
        $this->rows = $rows;
        return $this;
    }

    /**
     * @return Matrix
     * @throws CyberkonsultantSDKException
     */
    public function getResult(): Matrix
    {
        if ($this->columns === null || $this->rows === null) {
            throw new CyberkonsultantSDKException('Properties `columns` and `rows` are both required in the matrix scope');
        }

        return new Matrix($this->columns, $this->rows);
    }

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endMatrixBuilder(): ConfigurationBuilderInterface
    {
        return $this->parent;
    }
}