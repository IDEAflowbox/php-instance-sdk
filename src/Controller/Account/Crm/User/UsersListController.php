<?php

namespace App\Controller\Account\Crm\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersListController extends AbstractController
{
    #[Route('/account/crm/user/list', name: 'account_crm_user_list')]
    public function userList(): Response
    {
        return $this->render('account/crm/customer/list.html.twig', []);
    }
}
