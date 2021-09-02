<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\ErrorResponse;

/**
 * Class ErrorResponseAssembler
 *
 * @package Cyberkonsultant
 */
class ErrorResponseAssembler
{
    /**
     * @param ErrorResponse $responseDTO
     * @return array
     */
    public function readDTO(ErrorResponse $responseDTO): array
    {
        return [
            'error' => $responseDTO->getError(),
        ];
    }

    /**
     * @param array $response
     * @return ErrorResponse
     */
    public function writeDTO(array $response): ErrorResponse
    {
        return new ErrorResponse(
            $response['error']
        );
    }
}