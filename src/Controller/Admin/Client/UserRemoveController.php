<?php

namespace App\Controller\Admin\Client;

use App\Entity\Client;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserRemoveController extends AbstractController
{
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
