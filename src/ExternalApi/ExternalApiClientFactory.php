<?php

namespace App\ExternalApi;

use App\Entity\Client;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ExternalApiClientFactory
{
    public function __construct(
        private HttpClientInterface $httpClient,
    ) {
    }

    public function __invoke(Client $client): ExternalApiClientInterface
    {
        return new ExternalApiClient(
            $this->httpClient,
            $client->getExternalApiConfig()
        );
    }
}
