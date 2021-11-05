<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlaygroundController extends AbstractController
{
    #[Route('/playground', name: 'playground')]
    public function index(): Response
    {
        return $this->render('playground.html.twig');
    }
}
