<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

/**
 * Interface SuccessResponse
 *
 * @package Cyberkonsultant
 */
interface SuccessResponse
{
    /**
     * @return string
     */
    public function getSuccess(): string;
}