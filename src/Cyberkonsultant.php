<?php
declare(strict_types=1);

namespace Cyberkonsultant;

use Cyberkonsultant\Assembler\DataAssemblerInterface;
use Cyberkonsultant\Assembler\PaginationResponseAssembler;
use Cyberkonsultant\Authentication\Client;
use Cyberkonsultant\Authentication\Credentials;
use Cyberkonsultant\DTO\PaginationResponse;
use Cyberkonsultant\Exception\CyberkonsultantSDKException;
use Cyberkonsultant\Scope\Crm;
use Cyberkonsultant\Scope\Misc;
use Cyberkonsultant\Scope\Shop;
use Cyberkonsultant\Scope\Voice;
use Unirest\Response;

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
     * Default timeout
     * @var int
     */
    protected $timeout = 5;

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
     * @return Response
     * @throws CyberkonsultantSDKException
     * @throws Exception\ClientException
     * @throws Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function get(string $uri, array $options = []): Response
    {
        return $this->client->sendRequest('GET', $uri, $options, $this->timeout);
    }

    /**
     * Send POST request and return the result.
     *
     * @param string $uri
     * @param array $options
     * @return Response
     * @throws CyberkonsultantSDKException
     * @throws Exception\ClientException
     * @throws Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function post(string $uri, array $options = []): Response
    {
        return $this->client->sendRequest('post', $uri, $options, $this->timeout);
    }

    /**
     * Send DELETE request and return the result.
     *
     * @param string $uri
     * @param array $options
     * @return Response
     * @throws CyberkonsultantSDKException
     * @throws Exception\ClientException
     * @throws Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function delete(string $uri, array $options = []): Response
    {
        return $this->client->sendRequest('DELETE', $uri, $options, $this->timeout);
    }

    /**
     * Send PATCH request and return the result.
     *
     * @param string $uri
     * @param array $options
     * @return Response
     * @throws CyberkonsultantSDKException
     * @throws Exception\ClientException
     * @throws Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function patch(string $uri, array $options = []): Response
    {
        return $this->client->sendRequest('PATCH', $uri, $options, $this->timeout);
    }

    /**
     * Send PUT request and return the result.
     *
     * @param string $uri
     * @param array $options
     * @return Response
     * @throws CyberkonsultantSDKException
     * @throws Exception\ClientException
     * @throws Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function put(string $uri, array $options = []): Response
    {
        return $this->client->sendRequest('PUT', $uri, $options, $this->timeout);
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
     * @return Crm
     */
    public function getCrmScope(): Crm
    {
        return new Crm($this);
    }

    /**
     * @return Misc
     */
    public function getMiscScope(): Misc
    {
        return new Misc($this);
    }

    /**
     * @param Response $response
     * @return array
     */
    public function parseResponse(Response $response): array
    {
        return json_decode($response->raw_body, true);
    }

    /**
     * @param Response $response
     * @param string $assemblerFQCN
     * @return PaginationResponse
     * @throws CyberkonsultantSDKException
     */
    public function getPaginationResponse(Response $response, string $assemblerFQCN): PaginationResponse
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
     * @param Response $response
     * @param string $assemblerFQCN
     * @return mixed
     * @throws CyberkonsultantSDKException
     */
    public function getEdgeResponse(Response $response, string $assemblerFQCN)
    {
        $assembler = new $assemblerFQCN();

        if($assembler instanceof DataAssemblerInterface === false) {
            throw new CyberkonsultantSDKException('Passed assembler class not implementing DataAssemblerInterface.');
        }

        return $assembler->writeDTO($this->parseResponse($response));
    }

    /**
     * @param int $timeout
     */
    public function setTimeout(int $timeout): void
    {
        $this->timeout = $timeout;
    }
}