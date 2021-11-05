<?php

namespace App\Bridge\Cyberkonsultant;

use App\Entity\User;
use Cyberkonsultant\Cyberkonsultant as BaseCyberkonsultant;
use Symfony\Component\Security\Core\Security;

class Cyberkonsultant extends BaseCyberkonsultant
{
    public function __construct(
        Security $security
    )
    {
        /** @var User $user */
        $user = $security->getUser();

        if (!($api = $user->getClient()?->getExternalApiConfig())) {
            throw new \Exception('Missing External API configuration');
        }

        parent::__construct([
            'api_url' => $api->getUrl(),
            'access_token' => $api->getToken(),
        ]);
    }
}