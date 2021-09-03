<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

use Cyberkonsultant\Model\SuccessResponse as SuccessResponseInterface;

/**
 * Class SuccessResponse
 *
 * @package Cyberkonsultant
 */
class SuccessResponse implements SuccessResponseInterface
{
    /**
     * @var string
     */
    protected $success;

    /**
     * SuccessResponse constructor.
     * @param string $success
     */
    public function __construct(string $success)
    {
        $this->success = $success;
    }

    /**
     * @return string
     */
    public function getSuccess(): string
    {
        return $this->success;
    }
}