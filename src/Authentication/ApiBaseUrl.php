<?php
declare(strict_types=1);

namespace Cyberkonsultant\Authentication;

use Cyberkonsultant\Exception\CyberkonsultantSDKException;

class ApiBaseUrl
{
    /**
     * The url of API.
     *
     * @var string
     */
    protected $url = '';

    /**
     * ApiBaseUrl constructor.
     *
     * @param string $url
     * @throws CyberkonsultantSDKException
     */
    public function __construct(string $url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new CyberkonsultantSDKException('Given URL is not valid.');
        }
        $this->setUrl($url);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = rtrim($url, '/');
    }

    public function __toString(): string
    {
        return $this->url;
    }
}