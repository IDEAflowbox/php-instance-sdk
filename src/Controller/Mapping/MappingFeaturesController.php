<?php

namespace App\Controller\Mapping;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Controller\BaseController;
use Cyberkonsultant\Model\SuccessResponse;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MappingFeaturesController extends BaseController
{
    #[Route('/mapping/features', name: 'mapping_features')]
    public function index(
        Cyberkonsultant $cyberkonsultant,
        Request $request
    ): Response {
        $features = $cyberkonsultant->getShopScope()->feature->get();
        $featuresView = $this->createView($features);

        if ($this->isXhrRequest()) {
            $associations = [];
            foreach ($request->request->get('associations', []) as $association) {
                $associations[(string) $association['choiceId']] = $association['associatedTo'] ?? null;
            }

            $response = $cyberkonsultant->getShopScope()->feature->associateMany($associations);
            $responseView = $this->createView($response, [], $response instanceof SuccessResponse ? 200 : 400);
            return $this->handleView($responseView);
        }

        return $this->render('mapping/features.html.twig', [
            'features' => $this->serializeViewToObject($featuresView),
        ]);
    }
}
