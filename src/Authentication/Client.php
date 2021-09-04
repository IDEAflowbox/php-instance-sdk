<?php
declare(strict_types=1);

namespace Cyberkonsultant\Authentication;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Client
 *
 * @package Cyberkonsultant
 */
class Client
{
    /**
     * @var Credentials
     */
    protected $credentials;

    /**
     * @var GuzzleClient
     */
    protected $client;

    /**
     * Might be helpful for debugging.
     *
     * @var string
     */
    protected $lastRequest;

    public function __construct(Credentials $credentials, string $apiVersion)
    {
        $this->credentials = $credentials;
        $this->client = new GuzzleClient([
            'base_uri' => $this->getBaseUrl((string) $credentials->getUrl(), $apiVersion),
            'headers' => [
                'Authorization' => sprintf('Bearer %s', (string)$this->credentials->getAccessToken())
            ]
        ]);
    }

    /**
     * Get base url for API.
     *
     * @param string $url
     * @param string $apiVersion
     * @return string
     */
    protected function getBaseUrl(string $url, string $apiVersion): string
    {
        return sprintf('%s/api/%s/', $url, $apiVersion);
    }

    /**
     * Send request.
     *
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function sendRequest(string $method, string $uri, array $options = []): ResponseInterface
    {
        $uri = ltrim($uri, '/');
        $this->lastRequest = $this->client->request($method, $uri, $options);
        return $this->lastRequest;
    }
}