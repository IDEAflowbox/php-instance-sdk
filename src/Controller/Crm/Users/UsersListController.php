<?php

namespace App\Controller\Crm\Users;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Bridge\Cyberkonsultant\Service\PaginatorServiceInterface;
use App\Controller\BaseController;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersListController extends BaseController
{
    #[Route('/crm/users', name: 'crm_users_list')]
    public function index(
        Cyberkonsultant $cyberkonsultant,
        PaginatorServiceInterface $paginatorService,
        Request $request
    ): Response {
        $users = $cyberkonsultant->getShopScope()->user->get([
            'anonymous' => false,
            'page' => $request->get('page', 1),
            'limit' => $this->getPaginatorLimit(),
        ]);
        $pagination = $paginatorService->paginate($users);
        $paginationView = $this->createView($pagination);

        if ($this->isXhrRequest()) {
            return $this->handleView($paginationView);
        }

        return $this->render('crm/users/list.html.twig', [
            'pagination' => $this->serializeViewToObject($paginationView),
        ]);
    }
}
