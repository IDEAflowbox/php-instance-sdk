<?php
declare(strict_types=1);

namespace Cyberkonsultant\Authentication;

use Cyberkonsultant\Exception\CyberkonsultantSDKException;

class Credentials
{
    /**
     * @var ApiBaseUrl
     */
    protected $url;

    /**
     * @var AccessToken
     */
    protected $accessToken;

    /**
     * Credentials constructor.
     * @param string $url
     * @param string $accessToken
     * @throws CyberkonsultantSDKException
     */
    public function __construct(string $url, string $accessToken)
    {
        $this->url = new ApiBaseUrl($url);
        $this->accessToken = new AccessToken($accessToken);
    }

    /**
     * @return ApiBaseUrl
     */
    public function getUrl(): ApiBaseUrl
    {
        return $this->url;
    }

    /**
     * @return AccessToken
     */
    public function getAccessToken(): AccessToken
    {
        return $this->accessToken;
    }
}