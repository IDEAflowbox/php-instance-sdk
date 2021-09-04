<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

/**
 * Interface ErrorResponse
 *
 * @package Cyberkonsultant
 */
interface ErrorResponse
{
    /**
     * @return string
     */
    public function getError(): string;
}