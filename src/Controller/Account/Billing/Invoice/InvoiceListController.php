<?php

namespace App\Controller\Account\Billing\Invoice;

use App\Repository\InvoiceRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class InvoiceListController extends AbstractController
{
    #[Route('/account/billing/invoices', name: 'account_billing_invoices')]
    public function index(
        Security $security,
        InvoiceRepository $repository,
        Request $request,
        PaginatorInterface $paginator
    ): Response {
        $last = $repository->findLastByClient($security->getUser()->getClient());
        $query = $repository->createQueryBuilderWithClient($security->getUser()->getClient());

        if (null !== $last) {
            $query->andWhere('i.id != :id')
                ->setParameter('id', $last->getId(), 'uuid');
        }

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            25
        );

        return $this->render('account/billing/invoice/list.html.twig', [
            'pagination' => $pagination,
            'last' => $last,
        ]);
    }
}
