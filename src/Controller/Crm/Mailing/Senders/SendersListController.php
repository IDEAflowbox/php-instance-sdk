<?php

namespace App\Controller\Crm\Mailing\Senders;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Bridge\Cyberkonsultant\Service\PaginatorServiceInterface;
use App\Controller\BaseController;
use App\Form\CreateSenderType;
use Cyberkonsultant\DTO\SenderWithCredentials;
use Cyberkonsultant\Exception\ClientException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SendersListController extends BaseController
{
    #[Route('/crm/mailing/senders', name: 'crm_mailing_senders_list')]
    public function index(
        Cyberkonsultant $cyberkonsultant,
        PaginatorServiceInterface $paginatorService,
        Request $request
    ): Response {
        $feed = $cyberkonsultant->getCrmScope()->sender->get([
            'page' => $request->get('page', 1),
            'name' => $request->get('name'),
            'activated' => $request->get('activated'),
            'limit' => $this->getPaginatorLimit(),
        ]);
        $pagination = $paginatorService->paginate($feed);
        $paginationView = $this->createView($pagination);

        $sender = new SenderWithCredentials();
        $form = $this->createForm(CreateSenderType::class, $sender);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                try {
                    $response = $cyberkonsultant->getCrmScope()->sender->create($sender);
                    $view = $this->createView($response, [], 201);
                } catch (ClientException $e) {
                    $view = $this->createView($e, [], $e->getResponse()->code);
                }

                return $this->handleView($view);
            }
        } else if ($this->isXhrRequest()) {
            if ($request->getMethod() === 'POST') {
                $cyberkonsultant->getCrmScope()->sender->activateSender(
                    $request->get('senderId'),
                    $request->get('code')
                );
            }

            return $this->handleView($paginationView);
        }

        return $this->render('crm/mailing/senders/list.html.twig', [
            'pagination' => $this->serializeViewToObject($paginationView),
        ]);
    }
}
