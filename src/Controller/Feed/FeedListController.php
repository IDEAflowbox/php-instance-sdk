<?php

namespace App\Controller\Feed;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Controller\BaseController;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FeedListController extends BaseController
{
    #[Route('/feed', name: 'feed_list')]
    public function index(
        Cyberkonsultant $cyberkonsultant,
        Request $request
    ): Response {
        $feed = $cyberkonsultant->getShopScope()->product->get(['page' => $request->get('page', 1)]);
        $pagination = new SlidingPagination([]);
        $pagination->setCurrentPageNumber($feed->getCurrentPage());
        $pagination->setTotalItemCount($feed->getRows());
        $pagination->setItemNumberPerPage(50);
        $pagination->setItems($feed->getData());
        $paginationView = $this->createView($pagination);

        if ($this->isXhrRequest()) {
            return $this->handleView($paginationView);
        }

        return $this->render('feed/list.html.twig', [
            'pagination' => $this->serializeViewToObject($paginationView),
            //'last' => $this->serializeViewToObject($lastInvoiceView),
        ]);
    }
}
