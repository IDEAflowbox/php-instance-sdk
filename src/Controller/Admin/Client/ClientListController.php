<?php

namespace App\Controller\Admin\Client;

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
        Request $request,
        PaginatorInterface $paginator
    ): Response {
        $pagination = $paginator->paginate(
            $repository->createQueryBuilder('c'),
            $request->query->getInt('page', 1),
            25
        );

        return $this->render('admin/client/list.html.twig', [
            'pagination' => $pagination,
        ]);
    }
}
