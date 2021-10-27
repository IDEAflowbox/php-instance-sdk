<?php

namespace App\Controller\Crm\Users;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
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
        Request $request
    ): Response {
        $users = $cyberkonsultant->getShopScope()->user->get(['anonymous' => false, 'page' => $request->get('page', 1)]);
        $pagination = new SlidingPagination([]);
        $pagination->setCurrentPageNumber($users->getCurrentPage());
        $pagination->setTotalItemCount($users->getRows());
        $pagination->setItemNumberPerPage(20);
        $pagination->setItems($users->getData());
        $paginationView = $this->createView($pagination);

        if ($this->isXhrRequest()) {
            return $this->handleView($paginationView);
        }

        return $this->render('crm/users/list.html.twig', [
            'pagination' => $this->serializeViewToObject($paginationView),
        ]);
    }
}
