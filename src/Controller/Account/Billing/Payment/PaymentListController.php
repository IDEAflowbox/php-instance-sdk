<?php

namespace App\Controller\Account\Billing\Payment;

use App\Repository\PaymentRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class PaymentListController extends AbstractController
{
    #[Route('/account/billing/payments', name: 'account_billing_payments')]
    public function payments(
        Security $security,
        PaymentRepository $repository,
        Request $request,
        PaginatorInterface $paginator
    ): Response {
        $pagination = $paginator->paginate(
            $repository->createQueryBuilderWithClient($security->getUser()->getClient()),
            $request->query->getInt('page', 1),
            25
        );

        return $this->render('account/billing/payment/list.html.twig', [
            'pagination' => $pagination,
        ]);
    }
}
