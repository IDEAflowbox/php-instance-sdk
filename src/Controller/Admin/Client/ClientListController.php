<?php

namespace App\Controller\Admin\Client;

use App\Factory\ClientFactory;
use App\Form\CreateClientType;
use App\Repository\ClientRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientListController extends AbstractController
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
            $request->query->getInt('limit', 1)
        );

        $form = $this->createForm(CreateClientType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client = $clientFactory($form->getData());

            return $this->redirectToRoute('admin_client_show', ['client' => $client->getId()]);
        }

        return $this->render('admin/client/list.html.twig', [
            'search' => $request->get('search'),
            'limit' => $request->query->getInt('limit', 25),
            'pagination' => $pagination,
            'formView' => $form->createView(),
            'clientModalShow' => $form->isSubmitted() && !$form->isValid(),
        ]);
    }
}
