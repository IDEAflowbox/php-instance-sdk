<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\SuccessResponse;

/**
 * Class SuccessResponseAssembler
 *
 * @package Cyberkonsultant
 */
class SuccessResponseAssembler implements DataAssemblerInterface
{
    /**
     * @param SuccessResponse $responseDTO
     * @return array
     */
    public function readDTO(SuccessResponse $responseDTO): array
    {
        return [
            'success' => $responseDTO->getSuccess(),
        ];
    }

    /**
     * @param array $response
     * @return SuccessResponse
     */
    public function writeDTO(array $response): SuccessResponse
    {
        return new SuccessResponse(
            $response['success']
        );
    }
}