<?php

namespace App\Controller\Frames;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Controller\BaseController;
use App\Form\CreateAdvancedFrameType;
use Cyberkonsultant\DTO\RecommendationFrame;
use Cyberkonsultant\Exception\ClientException;
use Cyberkonsultant\Model\SuccessResponse;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FramesAddController extends BaseController
{
    #[Route('/frames/add/advanced', name: 'frame_add_advanced')]
    public function addAdvanced(
        Cyberkonsultant $cyberkonsultant,
        Request $request
    ): Response {
        $frame = new RecommendationFrame();
        $form = $this->createForm(CreateAdvancedFrameType::class, $frame);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                try {
                    $response = $cyberkonsultant->getShopScope()->recommendationFrame->create($frame);
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

        return $this->render('frames/add/advanced.html.twig', [
            //'pagination' => $this->serializeViewToObject($paginationView),
        ]);
    }
}
