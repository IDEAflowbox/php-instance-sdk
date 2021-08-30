<?php

namespace App\Controller\Admin\Client;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientShowController extends AbstractController
{
    #[Route('/admin/client/{client}/show', name: 'admin_client_show')]
    public function show(Client $client): Response
    {
        return $this->render('admin/client/show.html.twig', [
            'client' => $client,
        ]);
    }
}
