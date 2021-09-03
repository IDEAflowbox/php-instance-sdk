<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

interface SuccessResponse
{
    /**
     * @return string
     */
    public function getSuccess(): string;
}