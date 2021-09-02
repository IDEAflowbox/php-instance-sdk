<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Class Matrix
 *
 * @package Cyberkonsultant
 */
class Matrix
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
     * Matrix constructor.
     * @param int $columns
     * @param int $rows
     */
    public function __construct(int $columns, int $rows)
    {
        $this->columns = $columns;
        $this->rows = $rows;
    }

    /**
     * @return int
     */
    public function getColumns(): int
    {
        return $this->columns;
    }

    /**
     * @return int
     */
    public function getRows(): int
    {
        return $this->rows;
    }
}