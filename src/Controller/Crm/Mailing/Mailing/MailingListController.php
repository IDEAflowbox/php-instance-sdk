<?php

namespace App\Controller\Crm\Mailing\Mailing;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Bridge\Cyberkonsultant\Service\PaginatorServiceInterface;
use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailingListController extends BaseController
{
    #[Route('/crm/mailing', name: 'crm_mailing_mailing_list')]
    public function index(
        Cyberkonsultant $cyberkonsultant,
        PaginatorServiceInterface $paginatorService,
        Request $request
    ): Response {
        $feed = $cyberkonsultant->getCrmScope()->message->get([
            'page' => $request->get('page', 1),
            'limit' => $this->getPaginatorLimit(),
            'name' => $request->get('search')
        ]);
        $pagination = $paginatorService->paginate($feed);
        $paginationView = $this->createView($pagination);

        if ($this->isXhrRequest()) {
            return $this->handleView($paginationView);
        }

        return $this->render('crm/mailing/mailing/list.html.twig', [
            'pagination' => $this->serializeViewToObject($paginationView),
        ]);
    }
}
