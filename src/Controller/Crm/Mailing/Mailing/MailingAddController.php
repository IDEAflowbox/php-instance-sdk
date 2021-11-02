<?php

namespace App\Controller\Crm\Mailing\Mailing;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Bridge\Cyberkonsultant\Service\PaginatorServiceInterface;
use App\Controller\BaseController;
use App\Form\CreateMailingType;
use Cyberkonsultant\DTO\Message;
use Cyberkonsultant\Exception\ClientException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailingAddController extends BaseController
{
    #[Route('/crm/mailing/add', name: 'crm_mailing_mailing_add')]
    public function index(
        Cyberkonsultant $cyberkonsultant,
        Request $request
    ): Response {
        $message = new Message();
        $form = $this->createForm(CreateMailingType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                try {
                    $response = $cyberkonsultant->getCrmScope()->message->create($message);
                    $view = $this->createView($response, [], 201);
                } catch (ClientException $e) {
                    $view = $this->createView($e, [], $e->getResponse()->code);
                }

                return $this->handleView($view);
            } else if ($this->isXhrRequest()) {
                $view = $this->createView($form->getErrors(), [], 400);
                return $this->handleView($view);
            }
        }

        return $this->render('crm/mailing/mailing/add.html.twig');
    }
}
