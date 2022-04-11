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

    /**
     * @param int $columns
     */
    public function setColumns(int $columns): void
    {
        $this->columns = $columns;
    }

    /**
     * @param int $rows
     */
    public function setRows(int $rows): void
    {
        $this->rows = $rows;
    }
}