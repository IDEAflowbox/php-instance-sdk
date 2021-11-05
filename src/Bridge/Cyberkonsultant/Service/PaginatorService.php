<?php
declare(strict_types=1);

namespace App\Bridge\Cyberkonsultant\Service;

use Cyberkonsultant\Model\ListResponse;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Knp\Component\Pager\Pagination\PaginationInterface;

class PaginatorService implements PaginatorServiceInterface
{
    public function paginate(ListResponse $response): PaginationInterface
    {
        $pagination = new SlidingPagination([]);
        $pagination->setCurrentPageNumber($response->getCurrentPage());
        $pagination->setTotalItemCount($response->getRows());
        $pagination->setItemNumberPerPage($response->getRowsPerPage());
        $pagination->setItems($response->getData());
        return $pagination;
    }
}