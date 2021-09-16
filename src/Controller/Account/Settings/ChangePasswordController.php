<?php

namespace App\Controller\Account\Settings;

use App\Form\AccountChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ChangePasswordController extends AbstractController
{
    #[Route('/account/settings/account/change-password', name: 'account_settings_account_change_password')]
    public function accountDetails(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $hasher,
        Security $security
    ): Response {
        $user = $security->getUser();
        $form = $this->createForm(AccountChangePasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $hasher->hashPassword($user, $form->getData()->getPlainPassword())
            );

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('account_settings_account_details');
        }

        return $this->render('account/settings/change-password.html.twig', [
            'formView' => $form->createView(),
        ]);
    }
}
