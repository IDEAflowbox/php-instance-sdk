<?php

namespace App\Twig;

use Symfony\Component\Security\Core\Authentication\Token\SwitchUserToken;
use Symfony\Component\Security\Core\Security;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ImpersonationExtension extends AbstractExtension
{
    public function __construct(
        private Security $security
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('impersonator_user_name', [$this, 'impersonatorUserName']),
        ];
    }

    public function impersonatorUserName(): ?string
    {
        $token = $this->security->getToken();
        if ($token instanceof SwitchUserToken) {
            $impersonatorUser = $token->getOriginalToken()->getUser();

            return sprintf('%s %s', $impersonatorUser->getFirstName(), $impersonatorUser->getLastName());
        }

        return null;
    }
}
