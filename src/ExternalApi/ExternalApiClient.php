<?php

namespace App\ExternalApi;

use App\Entity\ExternalApiConfig;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ExternalApiClient implements ExternalApiClientInterface
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private ExternalApiConfig $config
    ) {
    }
}
