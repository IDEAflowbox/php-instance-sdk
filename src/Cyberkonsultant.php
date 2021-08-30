<?php
declare(strict_types=1);

namespace Cyberkonsultant;

use Cyberkonsultant\Authentication\Client;
use Cyberkonsultant\Authentication\Credentials;
use Cyberkonsultant\Exception\CyberkonsultantSDKException;
use Cyberkonsultant\Mapper\JsonMapper;
use Cyberkonsultant\Scope\Shop;
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
     * @param array|object|string $json
     * @param string $model
     * @return mixed|object
     */
    public function map($json, string $model)
    {
        $mapper = new JsonMapper();
        return $mapper->map($json, $model);
    }
}