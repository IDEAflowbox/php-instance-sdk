<?php

namespace App\Controller\Admin\Client;

use App\Entity\Client;
use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ClientUserAddController extends AbstractController
{
    public function addUser(
        Client $client,
        RequestStack $requestStack,
        UserPasswordHasherInterface $hasher,
        EntityManagerInterface $em
    ): Response {
        $request = $requestStack->getMainRequest();

        $userForm = $this->createForm(UserType::class);
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            /** @var User $user */
            $user = $userForm->getData();
            $user->setClient($client);
            $user->setPassword($hasher->hashPassword($user, $user->getPlainPassword()));

            $em->persist($user);
            $em->flush();
        }

        return $this->render('admin/client/modal/user_add_modal.html.twig', [
            'client' => $client,
            'userFormView' => $userForm->createView(),
            'userModalShow' => $userForm->isSubmitted() && !$userForm->isValid(),
        ]);
    }
}
