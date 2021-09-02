<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

use Cyberkonsultant\Model\ErrorResponse as ErrorResponseInterface;

/**
 * Class ErrorResponse
 *
 * @package Cyberkonsultant
 */
class ErrorResponse implements ErrorResponseInterface
{
    /**
     * @var string
     */
    protected $error;

    /**
     * ErrorResponse constructor.
     * @param string $error
     */
    public function __construct(string $error)
    {
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }
}