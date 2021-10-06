<?php

namespace App\Controller\Admin\Client;

use App\Controller\BaseController;
use App\Factory\ClientFactory;
use App\Form\CreateClientType;
use App\Repository\ClientRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientListController extends BaseController
{
    #[Route('/admin/client/list', name: 'admin_client_list')]
    public function index(
        ClientRepository $repository,
        ClientFactory $clientFactory,
        Request $request,
        PaginatorInterface $paginator
    ): Response {
        $pagination = $paginator->paginate(
            $repository->queryBuilder($request->get('search')),
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 25)
        );

        $view = $this->createView($pagination);
        if ($this->isXhrRequest()) {
            return $this->handleView($view);
        }

        $form = $this->createForm(CreateClientType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client = $clientFactory($form->getData());

            return $this->redirectToRoute('admin_client_show', ['client' => $client->getId()]);
        }

        return $this->render('admin/client/list.html.twig', [
            'pagination' => $this->serializeViewToObject($view),
        ]);
    }
}
