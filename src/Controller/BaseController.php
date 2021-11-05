<?php

namespace App\Controller;

use FOS\RestBundle\Context\Context;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use phpDocumentor\Reflection\Utils;

abstract class BaseController extends AbstractFOSRestController
{
    private const PAGINATOR_DEFAULT_LIMIT = 20;
    private const PAGINATOR_MAX_LIMIT = 50;

    protected SerializerInterface $serializer;

    public function getPaginatorLimit(): int
    {
        if (!$request = $this->get('request_stack')->getCurrentRequest()) {
            return self::PAGINATOR_MAX_LIMIT;
        }

        $limit = $request->get('limit', self::PAGINATOR_DEFAULT_LIMIT);
        if ($limit <= 0) {
            return self::PAGINATOR_DEFAULT_LIMIT;
        }

        if ($limit > self::PAGINATOR_MAX_LIMIT) {
            return self::PAGINATOR_MAX_LIMIT;
        }

        return $limit;
    }

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function isXhrRequest(): bool
    {
        if (!$request = $this->get('request_stack')->getCurrentRequest()) {
            return false;
        }

        return $request->headers->has('Accept') && $request->headers->get('accept') === 'application/json';
    }

    protected function createView(
        $data = null,
        $groups = [],
        $statusCode = 200,
        array $headers = []
    ): View {
        $context = new Context();
        $context->setSerializeNull(true);

        if (count($groups)) {
            $context->setGroups($groups);
        }

        $view = View::create($data, $statusCode, $headers);
        $view->setContext($context);
        $view->setFormat('json');

        return $view;
    }

    protected function serializeView(View $view): string
    {
        $context = SerializationContext::create();
        $context->setSerializeNull($view->getContext()->getSerializeNull());

        return $this->serializer->serialize($view->getData(), $view->getFormat(), $context);
    }

    protected function serializeViewToObject(View $view): object|array
    {
        return json_decode($this->serializeView($view));
    }
}