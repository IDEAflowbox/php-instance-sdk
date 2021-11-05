<?php

namespace App\Controller\Crm\Users;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Bridge\Cyberkonsultant\Service\PaginatorServiceInterface;
use App\Controller\BaseController;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersDetailsController extends BaseController
{
    #[Route('/crm/users/{userId}', name: 'crm_users_details')]
    public function index(
        Cyberkonsultant $cyberkonsultant,
        PaginatorServiceInterface $paginatorService,
        Request $request
    ): Response {
        $user = $cyberkonsultant->getShopScope()->user->find($request->get('userId'));
        $userView = $this->createView($user);

        if ($this->isXhrRequest()) {
            return $this->handleView($userView);
        }

        return $this->render('crm/users/details.html.twig', [
            'user' => $this->serializeViewToObject($userView),
        ]);
    }
}
