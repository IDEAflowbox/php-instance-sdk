<?php

namespace App\Twig;

use App\Entity\IssuerAddress;
use App\Repository\IssuerAddressRepository;
use Symfony\Component\Security\Core\Security;
use Limenius\ReactRenderer\Context\ContextProviderInterface;
use Limenius\ReactRenderer\Renderer\AbstractReactRenderer;
use Limenius\ReactRenderer\Twig\ReactRenderExtension;
use Twig\TwigFunction;

class ReactGlobalComponentExtension extends ReactRenderExtension
{
    protected $security;
    protected $issuers = [];

    public function __construct(
        Security $security,
        AbstractReactRenderer $renderer = null,
        ContextProviderInterface $contextProvider,
        IssuerAddressRepository $issuerAddressRepository,
        string $defaultRendering,
        bool $trace = false
    ) {
        $this->security = $security;
        $this->issuers = array_map(static function (IssuerAddress $issuerAddress) {
            return [
                'id' => $issuerAddress->getId(),
                'name' => implode(
                    ', ',
                    [
                        $issuerAddress->getCompanyName(),
                        $issuerAddress->getCity(),
                        $issuerAddress->getCountry(),
                    ]
                )
            ];
        }, $issuerAddressRepository->findAll());
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

    public function reactRenderComponent(string $componentName, array $options = array()): string
    {
        if (!isset($options['props'])) {
            $options['props'] = [];
        }
        if (!isset($options['props']['_globals'])) {
            $options['props']['_globals'] = [];
        }
        $options['props']['_globals']['user'] = $this->getUser();
        $options['props']['_globals']['issuers_addresses'] = $this->issuers;

        return parent::reactRenderComponent($componentName, $options);
    }

    public function reactRenderGlobalComponent(string $componentName): string
    {
        return $this->reactRenderComponent($componentName, [
            'rendering' => 'client_side',
        ]);
    }
}