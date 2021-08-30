<?php
declare(strict_types=1);

namespace Cyberkonsultant\Authentication;

/**
 * Class AccessToken
 *
 * @package Cyberkonsultant
 */
class AccessToken
{
    /**
     * Access token value.
     *
     * @var string
     */
    protected $value = "";

    /**
     * @var \DateTime|null
     */
    protected $expiresAt;

    /**
     * AccessToken constructor.
     *
     * @param string $accessToken
     * @param int $expiresAt
     */
    public function __construct(string $accessToken, int $expiresAt = 0)
    {
        $this->value = $accessToken;
        if ($expiresAt) {
            $this->setExpiresAtFromTimeStamp($expiresAt);
        }
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }

    /**
     * @return bool|null
     */
    public function isExpired(): ?bool
    {
        if ($this->getExpiresAt() instanceof \DateTime) {
            return $this->getExpiresAt()->getTimestamp() < time();
        }

        return null;
    }

    /**
     * Setter for expires_at.
     *
     * @param int $timeStamp
     */
    protected function setExpiresAtFromTimeStamp(int $timeStamp): void
    {
        $dt = new \DateTime();
        $dt->setTimestamp($timeStamp);
        $this->expiresAt = $dt;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}