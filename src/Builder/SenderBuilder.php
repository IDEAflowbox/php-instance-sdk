<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\SenderWithCredentials;

/**
 * Class SegmentBuilder
 *
 * @package Cyberkonsultant
 */
class SenderBuilder implements SenderBuilderInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var int
     */
    protected $port;

    /**
     * @param string $name
     * @return SenderBuilderInterface
     */
    public function setName(string $name): SenderBuilderInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $email
     * @return SenderBuilderInterface
     */
    public function setEmail(string $email): SenderBuilderInterface
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $host
     * @return SenderBuilderInterface
     */
    public function setHost(string $host): SenderBuilderInterface
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @param string $username
     * @return SenderBuilderInterface
     */
    public function setUsername(string $username): SenderBuilderInterface
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param string $password
     * @return SenderBuilderInterface
     */
    public function setPassword(string $password): SenderBuilderInterface
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param int $port
     * @return SenderBuilderInterface
     */
    public function setPort(int $port): SenderBuilderInterface
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @return SenderWithCredentials
     */
    public function getResult(): SenderWithCredentials
    {
        $sender = new SenderWithCredentials();
        $sender->setName($this->name);
        $sender->setEmail($this->email);
        $sender->setHost($this->host);
        $sender->setUsername($this->username);
        $sender->setPassword($this->password);
        $sender->setPort($this->port);

        return $sender;
    }
}