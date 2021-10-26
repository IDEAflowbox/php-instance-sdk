<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\SenderWithCredentials;

/**
 * Interface SenderBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface SenderBuilderInterface
{
    /**
     * @param string $name
     * @return SenderBuilderInterface
     */
    public function setName(string $name): SenderBuilderInterface;

    /**
     * @param string $email
     * @return SenderBuilderInterface
     */
    public function setEmail(string $email): SenderBuilderInterface;

    /**
     * @param string $host
     * @return SenderBuilderInterface
     */
    public function setHost(string $host): SenderBuilderInterface;

    /**
     * @param string $username
     * @return SenderBuilderInterface
     */
    public function setUsername(string $username): SenderBuilderInterface;

    /**
     * @param string $password
     * @return SenderBuilderInterface
     */
    public function setPassword(string $password): SenderBuilderInterface;

    /**
     * @param int $port
     * @return SenderBuilderInterface
     */
    public function setPort(int $port): SenderBuilderInterface;

    /**
     * @return SenderWithCredentials
     */
    public function getResult(): SenderWithCredentials;
}