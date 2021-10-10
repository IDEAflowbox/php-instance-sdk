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
        $paginationResponse = new PaginationResponse(
            $response['current_page'],
            $response['last_page'],
            $response['rows'],
            isset($response['data']) ? $response['data'] : []
        );

        if ($callback instanceof \Closure) {
            $paginationResponse->setData(array_map($callback, $paginationResponse->getData()));
        }

        return $paginationResponse;
    }
}