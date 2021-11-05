<?php

namespace App\Controller\Account\Settings;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Controller\BaseController;
use App\Form\AccountDetailsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class AccountDetailsController extends BaseController
{
    #[Route('/account/settings/account', name: 'account_settings_account_details')]
    public function accountDetails(
        Request $request,
        EntityManagerInterface $em,
        Security $security,
        Cyberkonsultant $ck
    ): Response {
        $user = $security->getUser();
        $form = $this->createForm(AccountDetailsType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('account_settings_account_details');
        }

        $userView = $this->createView($user);
        return $this->render('account/settings/account-details.html.twig', [
            'user' => $this->serializeViewToObject($userView),
        ]);
    }
}
