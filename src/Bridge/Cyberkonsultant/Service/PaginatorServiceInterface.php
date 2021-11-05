<?php
declare(strict_types=1);

namespace App\Bridge\Cyberkonsultant\Service;

use Cyberkonsultant\Model\ListResponse;
use Knp\Component\Pager\Pagination\PaginationInterface;

interface PaginatorServiceInterface
{
    public function paginate(ListResponse $response): PaginationInterface;
}