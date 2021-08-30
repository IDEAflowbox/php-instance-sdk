<?php

namespace App\Controller\Admin\Client;

use App\Entity\Client;
use App\Form\ClientBillingItemsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientBillingItemsController extends AbstractController
{
    #[Route('/admin/client/{client}/billing/items', name: 'admin_billing_items')]
    public function show(
        Client $client,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $form = $this->createForm(ClientBillingItemsType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('admin_billing_items');
        }

        return $this->render('admin/client/billing_items.html.twig', [
            'client' => $client,
            'formView' => $form->createView(),
        ]);
    }
}
