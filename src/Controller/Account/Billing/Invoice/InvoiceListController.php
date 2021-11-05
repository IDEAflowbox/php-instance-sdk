<?php

namespace App\Controller\Account\Billing\Invoice;

use App\Controller\BaseController;
use App\Repository\InvoiceRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class InvoiceListController extends BaseController
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

        $paginationView = $this->createView($pagination);
        $lastInvoiceView = $this->createView($last);
        if ($this->isXhrRequest()) {
            return $this->handleView($paginationView);
        }

        return $this->render('account/billing/invoice/list.html.twig', [
            'pagination' => $this->serializeViewToObject($paginationView),
            'last' => $this->serializeViewToObject($lastInvoiceView),
        ]);
    }
}
