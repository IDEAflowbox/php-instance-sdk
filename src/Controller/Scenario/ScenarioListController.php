<?php

namespace App\Controller\Scenario;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Bridge\Cyberkonsultant\Service\PaginatorServiceInterface;
use App\Controller\BaseController;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScenarioListController extends BaseController
{
    #[Route('/feed/scenarios', name: 'scenario_list')]
    public function index(
        Cyberkonsultant $cyberkonsultant,
        PaginatorServiceInterface $paginatorService,
        Request $request
    ): Response {
        $feed = $cyberkonsultant->getShopScope()->group->get([
            'page' => $request->get('page', 1),
            'limit' => $this->getPaginatorLimit(),
        ]);
        $pagination = $paginatorService->paginate($feed);
        $paginationView = $this->createView($pagination);

        if ($this->isXhrRequest()) {
            return $this->handleView($paginationView);
        }

        return $this->render('scenario/list.html.twig', [
            'pagination' => $this->serializeViewToObject($paginationView),
        ]);
    }
}
