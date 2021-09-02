<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

interface ErrorResponse
{
    /**
     * @return string
     */
    public function getError(): string;
}