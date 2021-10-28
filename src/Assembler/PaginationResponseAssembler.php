<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\PaginationResponse;

/**
 * Class PaginationResponseAssembler
 *
 * @package Cyberkonsultant
 */
class PaginationResponseAssembler
{
    /**
     * @param PaginationResponse $response
     * @return array
     */
    public function readDTO(PaginationResponse $response): array
    {
        return [
            'current_page' => $response->getCurrentPage(),
            'last_page' => $response->getLastPage(),
            'rows' => $response->getRows(),
            'rows_per_page' => $response->getRowsPerPage(),
            'data' => $response->getData(),
        ];
    }

    /**
     * @param array $response
     * @param callable|null $callback
     * @return PaginationResponse
     */
    public function writeDTO(array $response, ?callable $callback = null): PaginationResponse
    {
        $paginationResponse = new PaginationResponse();
        $paginationResponse->setCurrentPage($response['current_page']);
        $paginationResponse->setLastPage($response['last_page']);
        $paginationResponse->setRows($response['rows']);
        $paginationResponse->setRowsPerPage($response['rows_per_page']);
        if (isset($response['data'])) {
            $paginationResponse->setData($response['data']);
        }


        if ($callback instanceof \Closure) {
            $paginationResponse->setData(array_map($callback, $paginationResponse->getData()));
        }

        return $paginationResponse;
    }
}