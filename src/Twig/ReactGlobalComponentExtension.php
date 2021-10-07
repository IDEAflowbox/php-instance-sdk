<?php

namespace App\Twig;

use App\Entity\Administrator;
use App\Entity\IssuerAddress;
use App\Entity\User;
use App\Repository\IssuerAddressRepository;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Security;
use Limenius\ReactRenderer\Context\ContextProviderInterface;
use Limenius\ReactRenderer\Renderer\AbstractReactRenderer;
use Limenius\ReactRenderer\Twig\ReactRenderExtension;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Impersonate\ImpersonateUrlGenerator;
use Twig\TwigFunction;

class ReactGlobalComponentExtension extends ReactRenderExtension
{
    protected array $issuers = [];
    protected Security $security;
    protected ImpersonateUrlGenerator $impersonateUrlGenerator;
    protected UrlGeneratorInterface $urlGenerator;
    protected ?UserInterface $user;

    public function __construct(
        Security $security,
        ContextProviderInterface $contextProvider,
        IssuerAddressRepository $issuerAddressRepository,
        ImpersonateUrlGenerator $impersonateUrlGenerator,
        UrlGeneratorInterface $urlGenerator,
        string $defaultRendering,
        AbstractReactRenderer $renderer = null,
        bool $trace = false
    ) {
        $this->impersonateUrlGenerator = $impersonateUrlGenerator;
        $this->urlGenerator = $urlGenerator;
        $this->security = $security;
        $this->user = $security->getUser();
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
        if (!$this->user) return null;

        return [
            'username' => $this->user->getUserIdentifier(),
            'first_name' => $this->user->getLastName(),
            'last_name' => $this->user->getFirstName(),
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

        $impersonationExitPath = null;

        if ($this->user instanceof User && $this->user->getClient()) {
            $impersonationExitPath = $this->impersonateUrlGenerator->generateExitPath($this->urlGenerator->generate(
                'admin_client_show',
                ['client' => $this->user->getClient()->getId()]
            ));
        }

        $options['props']['_globals']['user'] = $this->getUser();
        $options['props']['_globals']['issuersAddresses'] = $this->issuers;
        $options['props']['_globals']['impersonationExitPath'] = $impersonationExitPath;
        //$options['props']['_globals']['grants']['IS_IMPERSONATOR'] = $this->security->isGranted('IS_IMPERSONATOR');

        return parent::reactRenderComponent($componentName, $options);
    }

    public function reactRenderGlobalComponent(string $componentName): string
    {
        return $this->reactRenderComponent($componentName, [
            'rendering' => 'client_side',
        ]);
    }
}