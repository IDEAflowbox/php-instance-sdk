<?php

namespace App\Controller\Frames;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Controller\BaseController;
use Cyberkonsultant\Model\SuccessResponse;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FramesListController extends BaseController
{
    #[Route('/frames/list', name: 'frame_list')]
    public function index(
        Cyberkonsultant $cyberkonsultant,
        Request $request
    ): Response {
        $frames = $cyberkonsultant->getShopScope()->recommendationFrame->get(['page' => $request->get('page', 1)]);
        $pagination = new SlidingPagination([]);
        $pagination->setCurrentPageNumber($frames->getCurrentPage());
        $pagination->setTotalItemCount($frames->getRows());
        $pagination->setItemNumberPerPage(50);
        $pagination->setItems($frames->getData());
        $paginationView = $this->createView($pagination);

        if ($this->isXhrRequest()) {
            return $this->handleView($paginationView);
        }

        return $this->render('frames/list.html.twig', [
            'pagination' => $this->serializeViewToObject($paginationView),
        ]);
    }
}
