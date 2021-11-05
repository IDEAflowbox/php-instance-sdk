<?php

namespace App\Controller\Mapping;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Controller\BaseController;
use Cyberkonsultant\Model\SuccessResponse;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MappingCategoriesController extends BaseController
{
    #[Route('/mapping/categories', name: 'mapping_categories')]
    public function index(
        Cyberkonsultant $cyberkonsultant,
        Request $request
    ): Response {
        $categories = $cyberkonsultant->getShopScope()->category->get();
        $categoriesView = $this->createView($categories);

        if ($this->isXhrRequest()) {
            $associations = [];
            foreach ($request->request->get('associations', []) as $association) {
                $associations[(string) $association['categoryId']] = $association['associatedTo'] ?? null;
            }

            $response = $cyberkonsultant->getShopScope()->category->associateMany($associations);
            $responseView = $this->createView($response, [], $response instanceof SuccessResponse ? 200 : 400);
            return $this->handleView($responseView);
        }

        return $this->render('mapping/categories.html.twig', [
            'categories' => $this->serializeViewToObject($categoriesView),
        ]);
    }
}
