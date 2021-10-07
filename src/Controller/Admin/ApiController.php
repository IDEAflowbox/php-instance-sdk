<?php

namespace App\Controller\Admin;

use App\Controller\BaseController;
use App\Repository\IssuerAddressRepository;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends BaseController
{
    #[Route('/admin/api/issuers', 'admin_api_issuers_list')]
    public function listIssuersAddresses(IssuerAddressRepository $repository)
    {
        $view = $this->createView($repository->findAll());
        return $this->handleView($view);
    }
}