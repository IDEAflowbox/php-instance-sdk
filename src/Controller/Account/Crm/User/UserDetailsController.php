<?php

namespace App\Controller\Account\Crm\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserDetailsController extends AbstractController
{
    #[Route('/account/crm/user/{id}/show', name: 'account_crm_user_show')]
    public function userShow(string $id): Response
    {
        return $this->render('account/crm/customer/show.html.twig', []);
    }
}
