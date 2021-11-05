<?php

namespace App\Controller\Crm\Segments;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Bridge\Cyberkonsultant\Service\PaginatorServiceInterface;
use App\Controller\BaseController;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SegmentsListController extends BaseController
{
    #[Route('/crm/segments', name: 'crm_segments_list', methods: ["GET"])]
    public function index(
        Cyberkonsultant $cyberkonsultant,
        PaginatorServiceInterface $paginatorService,
        Request $request
    ): Response {
        $segments = $cyberkonsultant->getCrmScope()->segment->get([
            'page' => $request->get('page', 1),
            'limit' => $this->getPaginatorLimit(),
        ]);
        $pagination = $paginatorService->paginate($segments);
        $paginationView = $this->createView($pagination);

        if ($this->isXhrRequest()) {
            return $this->handleView($paginationView);
        }

        return $this->render('crm/segments/list.html.twig', [
            'pagination' => $this->serializeViewToObject($paginationView),
        ]);
    }
}
