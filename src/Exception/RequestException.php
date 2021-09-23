<?php
declare(strict_types=1);

namespace Cyberkonsultant\Exception;

use Unirest\Response;

/**
 * Class RequestException
 *
 * @package Cyberkonsultant
 */
class RequestException extends CyberkonsultantSDKException
{
    /**
     * @var Response
     */
    protected $response;

    /**
     * @var string|null
     */
    protected $uri;

    /**
     * @var string|null
     */
    protected $method;

    /**
     * RequestException constructor.
     * @param string $message
     * @param Response $response
     * @param string|null $uri
     * @param string|null $method
     * @param \Throwable|null $previous
     */
    public function __construct(
        string $message,
        Response $response,
        string $uri = null,
        string $method = null,
        \Throwable $previous = null
    )
    {
        $code = $response->code ?? 0;
        parent::__construct($message, $code, $previous);

        $this->response = $response;
        $this->uri = $uri;
        $this->method = $method;
    }

    /**
     * @param Response $response
     * @param string|null $uri
     * @param string|null $method
     * @param \Throwable|null $previous
     * @return ClientException|ServerException|mixed
     */
    public static function create(
        Response $response,
        string $uri = null,
        string $method = null,
        \Throwable $previous = null
    ) {
        $level = (int) \floor($response->code / 100);

        switch ($level) {
            case 4:
                $label = 'Client error';
                $className = ClientException::class;
                break;
            case 5:
                $label = 'Server error';
                $className = ServerException::class;
                break;

            default:
                $label = 'Unsuccessful request';
                $className = __CLASS__;
                break;
        }

        $message = \sprintf(
            '%s: `%s %s` resulted in a `%s %s` response',
            $label,
            $method,
            $uri,
            $response->code,
            $response->raw_body
        );

        return new $className($message, $response, $uri, $method, $previous);
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }
}