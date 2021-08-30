<?php

namespace App\Twig;

use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CurrentRouteExtension extends AbstractExtension
{
    public function __construct(
        private RequestStack $requestStack
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('when_route_eq', [$this, 'whenRouteEq']),
            new TwigFunction('when_route_in', [$this, 'whenRouteIn']),
        ];
    }

    public function whenRouteEq(string $routeName, ?string $className = null): ?string
    {
        if ($routeName === $this->requestStack->getCurrentRequest()->get('_route')) {
            return $className;
        }

        return null;
    }

    public function whenRouteIn(array $routeNames, ?string $className = null): ?string
    {
        if (in_array($this->requestStack->getCurrentRequest()->get('_route'), $routeNames)) {
            return $className;
        }

        return null;
    }
}
