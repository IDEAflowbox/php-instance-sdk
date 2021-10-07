<?php

namespace App\Controller\Admin\Client;

use App\Entity\Client;
use App\Form\ClientBillingItemsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientBillingItemsEditController extends AbstractController
{
    #[Route('/admin/client/{client}/billing-items/edit', name: 'admin_client_billing_items_edit')]
    public function show(
        Client $client,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $billingItemsForm = $this->createForm(ClientBillingItemsType::class, $client);
        $billingItemsForm->handleRequest($request);

        dump($billingItemsForm, $billingItemsForm->isValid());

        if ($billingItemsForm->isSubmitted() && $billingItemsForm->isValid()) {
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('admin_client_show', ['client' => $client->getId()]);
        }

        return $this->render('admin/client/billing_items_edit.html.twig', [
            'client' => $client,
            'billingItemsFormView' => $billingItemsForm->createView(),
        ]);
    }
}
