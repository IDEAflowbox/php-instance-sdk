<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

use Cyberkonsultant\Model\ListResponse;

/**
 * Class PaginationResponse
 *
 * @package Cyberkonsultant
 */
class PaginationResponse implements ListResponse
{
    /**
     * @var int
     */
    protected $currentPage;

    /**
     * @var int
     */
    protected $lastPage;

    /**
     * @var int
     */
    protected $rows;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * PaginationResponse constructor.
     * @param int $currentPage
     * @param int $lastPage
     * @param int $rows
     * @param array $data
     */
    public function __construct(int $currentPage, int $lastPage, int $rows, array $data = [])
    {
        $this->currentPage = $currentPage;
        $this->lastPage = $lastPage;
        $this->rows = $rows;
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @return int
     */
    public function getLastPage(): int
    {
        return $this->lastPage;
    }

    /**
     * @return int
     */
    public function getRows(): int
    {
        return $this->rows;
    }
}