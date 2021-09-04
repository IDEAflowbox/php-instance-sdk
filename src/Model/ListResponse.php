<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

/**
 * Interface ListResponse
 *
 * @package Cyberkonsultant
 */
interface ListResponse
{
    /**
     * @return int
     */
    public function getCurrentPage(): int;

    /**
     * @return int
     */
    public function getLastPage(): int;

    /**
     * @return int
     */
    public function getRows(): int;

    /**
     * @return array
     */
    public function getData(): array;

    /**
     * @param array $data
     */
    public function setData(array $data): void;
}