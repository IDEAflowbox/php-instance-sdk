<?php

namespace App\Controller\Account\Settings;

use App\Controller\BaseController;
use App\Form\BillingDetailsType;
use App\Repository\BillingAddressRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class BillingDetailsController extends BaseController
{
    #[Route('/account/settings/billing', name: 'account_settings_billing_details')]
    public function billingDetails(
        Request $request,
        BillingAddressRepository $repository,
        EntityManagerInterface $em,
        Security $security
    ): Response {
        $user = $security->getUser();
        $billingAddress = $repository->findOneBy(
            [
                'client' => $user->getClient(),
            ]
        );

        $form = $this->createForm(
            BillingDetailsType::class,
            $billingAddress
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (null === $billingAddress->getClient()) {
                $billingAddress->setClient($user->getClient());
            }

            $em->persist($billingAddress);
            $em->flush();

            return $this->redirectToRoute('account_settings_billing_details');
        }

        $billingAddressView = $this->createView($billingAddress);
        return $this->render('account/settings/billing-details.html.twig', [
            'billingAddress' => $this->serializeViewToObject($billingAddressView)
        ]);
    }
}
