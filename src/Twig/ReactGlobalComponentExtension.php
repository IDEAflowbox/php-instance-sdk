<?php

namespace App\Twig;

use Symfony\Component\Security\Core\Security;
use Limenius\ReactRenderer\Context\ContextProviderInterface;
use Limenius\ReactRenderer\Renderer\AbstractReactRenderer;
use Limenius\ReactRenderer\Twig\ReactRenderExtension;
use Twig\TwigFunction;

class ReactGlobalComponentExtension extends ReactRenderExtension
{
    protected $security;

    public function __construct(
        Security $security,
        AbstractReactRenderer $renderer = null,
        ContextProviderInterface $contextProvider,
        string $defaultRendering,
        bool $trace = false
    ) {
        $this->security = $security;
        parent::__construct($renderer, $contextProvider, $defaultRendering, $trace);
    }

    public function getFunctions(): array
    {
        $functions = parent::getFunctions();
        $functions[] = new TwigFunction('react_global_component', [$this, 'reactRenderGlobalComponent'], ['is_safe' => ['html']]);

        return $functions;
    }

    protected function getUser(): ?array
    {
        if (!$this->security->getUser()) return null;

        return [
            'username' => $this->security->getUser()->getUserIdentifier()
        ];
    }

    public function reactRenderGlobalComponent(string $componentName): string
    {
        return $this->reactRenderComponent($componentName, [
            'props' => [
                '_global' => [
                    'user' => $this->getUser()
                ]
            ],
            'rendering' => 'client_side',
        ]);
    }
}