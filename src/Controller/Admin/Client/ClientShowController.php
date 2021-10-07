<?php

namespace App\Controller\Admin\Client;

use App\Controller\BaseController;
use App\Entity\Client;
use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ClientShowController extends BaseController
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

        if ($userForm->isSubmitted()) {
            if ($userForm->isValid()) {
                /** @var User $user */
                $user = $userForm->getData();
                $user->setClient($client);
                $user->setPassword($hasher->hashPassword($user, $user->getPlainPassword()));

                $em->persist($user);
                $em->flush();

                $this->addFlash('success', 'User added');

                return $this->redirectToRoute('admin_client_show', ['client' => $client->getId()]);
            } else if ($this->isXhrRequest()) {
                $view = $this->createView($userForm->getErrors(), [], 400);
                return $this->handleView($view);
            }
        }

        $view = $this->createView($client);
        if ($this->isXhrRequest()) {
            return $this->handleView($view);
        }

        return $this->render('admin/client/show.html.twig', [
            'client' => $this->serializeViewToObject($view),
        ]);
    }
}
