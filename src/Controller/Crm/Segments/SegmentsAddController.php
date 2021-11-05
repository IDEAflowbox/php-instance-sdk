<?php

namespace App\Controller\Crm\Segments;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Bridge\Cyberkonsultant\Service\PaginatorServiceInterface;
use App\Controller\BaseController;
use App\Form\CreateSegmentType;
use Cyberkonsultant\DTO\Segment;
use Cyberkonsultant\Exception\ClientException;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SegmentsAddController extends BaseController
{
    #[Route('/crm/segments', name: 'crm_segments_add', methods: ["POST"])]
    public function index(
        Cyberkonsultant $cyberkonsultant,
        Request $request
    ): Response {
        $segment = new Segment();
        $form = $this->createForm(CreateSegmentType::class, $segment);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                try {
                    $response = $cyberkonsultant->getCrmScope()->segment->create($segment);
                    $view = $this->createView($response, [], 201);
                } catch (ClientException $e) {
                    $view = $this->createView($e, [], $e->getResponse()->code);
                }

                return $this->handleView($view);
            } else if ($this->isXhrRequest()) {
                $view = $this->createView($form->getErrors(), [], 400);
                return $this->handleView($view);
            }
        }
    }
}
