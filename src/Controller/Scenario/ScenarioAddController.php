<?php

namespace App\Controller\Scenario;

use App\Bridge\Cyberkonsultant\Cyberkonsultant;
use App\Controller\BaseController;
use App\Form\CreateScenarioType;
use Cyberkonsultant\DTO\Group;
use Cyberkonsultant\Exception\ClientException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScenarioAddController extends BaseController
{
    #[Route('/feed/scenarios', name: 'scenario_add', methods: ['POST'])]
    public function index(
        Cyberkonsultant $cyberkonsultant,
        Request $request
    ): Response {
        $scenario = new Group();
        $form = $this->createForm(CreateScenarioType::class, $scenario);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                try {
                    $response = $cyberkonsultant->getShopScope()->group->create($scenario);
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
