<?php

namespace App\Controller\Frames;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Bridge\Cyberkonsultant\Service\PaginatorServiceInterface;
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
        PaginatorServiceInterface $paginatorService,
        Request $request
    ): Response {
        $frames = $cyberkonsultant->getShopScope()->recommendationFrame->get([
            'page' => $request->get('page', 1),
            'limit' => $this->getPaginatorLimit(),
        ]);
        $pagination = $paginatorService->paginate($frames);
        $paginationView = $this->createView($pagination);

        if ($this->isXhrRequest()) {
            return $this->handleView($paginationView);
        }

        return $this->render('frames/list.html.twig', [
            'pagination' => $this->serializeViewToObject($paginationView),
        ]);
    }
}
