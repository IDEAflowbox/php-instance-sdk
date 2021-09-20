<?php
declare(strict_types=1);

namespace Cyberkonsultant;

use Cyberkonsultant\Assembler\DataAssemblerInterface;
use Cyberkonsultant\Assembler\PaginationResponseAssembler;
use Cyberkonsultant\Authentication\Client;
use Cyberkonsultant\Authentication\Credentials;
use Cyberkonsultant\DTO\PaginationResponse;
use Cyberkonsultant\Exception\CyberkonsultantSDKException;
use Cyberkonsultant\Scope\Shop;
use Cyberkonsultant\Scope\Voice;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Cyberkonsultant
 *
 * @package Cyberkonsultant
 */
class Cyberkonsultant
{
    /**
     * @const string SDK version
     */
    const VERSION = '1.0';

    /**
     * @const string API version
     */
    const API_VERSION = 'v1';

    /**
     * @var Credentials
     */
    protected $credentials;

    /**
     * @var Client
     */
    protected $client;

    /**
     * Cyberkonsultant constructor.
     *
     * @param array $config
     * @throws CyberkonsultantSDKException
     */
    public function __construct(array $config)
    {
        if (!isset($config['api_url'])) {
            throw new CyberkonsultantSDKException("Missing `api_url` parameter in config.");
        }

        if (!isset($config['access_token'])) {
            throw new CyberkonsultantSDKException("Missing `access_token` parameter in config.");
        }

        $this->credentials = new Credentials($config['api_url'], $config['access_token']);
        $this->client = new Client($this->credentials, self::API_VERSION);
    }

    /**
     * Send GET request and return the result.
     *
     * @param string $uri
     * @param array $options
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function get(string $uri, array $options = []): ResponseInterface
    {
        return $this->client->sendRequest('GET', $uri, $options);
    }

    /**
     * Send POST request and return the result.
     *
     * @param string $uri
     * @param array $options
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function post(string $uri, array $options = []): ResponseInterface
    {
        return $this->client->sendRequest('post', $uri, $options);
    }

    /**
     * Send DELETE request and return the result.
     *
     * @param string $uri
     * @param array $options
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function delete(string $uri, array $options = []): ResponseInterface
    {
        return $this->client->sendRequest('DELETE', $uri, $options);
    }

    /**
     * Send PATCH request and return the result.
     *
     * @param string $uri
     * @param array $options
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function patch(string $uri, array $options = []): ResponseInterface
    {
        return $this->client->sendRequest('PATCH', $uri, $options);
    }

    /**
     * Send PUT request and return the result.
     *
     * @param string $uri
     * @param array $options
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function put(string $uri, array $options = []): ResponseInterface
    {
        return $this->client->sendRequest('PUT', $uri, $options);
    }

    /**
     * @return Shop
     */
    public function getShopScope(): Shop
    {
        return new Shop($this);
    }

    /**
     * @return Voice
     */
    public function getVoiceScope(): Voice
    {
        return new Voice($this);
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    public function parseResponse(ResponseInterface $response): array
    {
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param ResponseInterface $response
     * @param string $assemblerFQCN
     * @return PaginationResponse
     * @throws CyberkonsultantSDKException
     */
    public function getPaginationResponse(ResponseInterface $response, string $assemblerFQCN): PaginationResponse
    {
        $assembler = new $assemblerFQCN();
        $responseAssembler = new PaginationResponseAssembler();

        if($assembler instanceof DataAssemblerInterface === false) {
            throw new CyberkonsultantSDKException('Passed assembler class not implementing DataAssemblerInterface.');
        }

        return $responseAssembler->writeDTO(
            $this->parseResponse($response),
            static function (array $data) use ($assembler) {
                return $assembler->writeDTO($data);
            }
        );
    }

    /**
     * @param ResponseInterface $response
     * @param string $assemblerFQCN
     * @return mixed
     * @throws CyberkonsultantSDKException
     */
    public function getEdgeResponse(ResponseInterface $response, string $assemblerFQCN)
    {
        $assembler = new $assemblerFQCN();

        if($assembler instanceof DataAssemblerInterface === false) {
            throw new CyberkonsultantSDKException('Passed assembler class not implementing DataAssemblerInterface.');
        }

        return $assembler->writeDTO($this->parseResponse($response));
    }
}