<?php

namespace App\Controller\Admin\Client;

use App\Entity\Client;
use App\Entity\User;
use App\Form\ClientBillingItemsType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ClientShowController extends AbstractController
{
    #[Route('/admin/client/{client}/show', name: 'admin_client_show')]
    public function show(
        Client $client,
        Request $request,
        UserPasswordHasherInterface $hasher,
        EntityManagerInterface $em
    ): Response {
        $userForm = $this->createForm(UserType::class);
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            /** @var User $user */
            $user = $userForm->getData();
            $user->setClient($client);
            $user->setPassword($hasher->hashPassword($user, $user->getPlainPassword()));

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'User added');

            return $this->redirectToRoute('admin_client_show', ['client' => $client->getId()]);
        }

        $billingItemsForm = $this->createForm(ClientBillingItemsType::class, $client);
        $billingItemsForm->handleRequest($request);

        if ($billingItemsForm->isSubmitted() && $billingItemsForm->isValid()) {
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('admin_client_show', ['client' => $client->getId()]);
        }

        return $this->render('admin/client/show.html.twig', [
            'client' => $client,
            'billingItemsFormView' => $billingItemsForm->createView(),
            'userFormView' => $userForm->createView(),
            'userModalShow' => $userForm->isSubmitted() && !$userForm->isValid(),
        ]);
    }

    #[Route('/admin/client/{client}/user/{user}/remove', name: 'admin_client_user_remove')]
    public function removeUser(
        Client $client,
        User $user,
        EntityManagerInterface $em
    ): Response {
        $this->addFlash('success', 'User removed');

        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('admin_client_show', ['client' => $client->getId()]);
    }
}
