<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Call;

/**
 * Interface CallBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface CallBuilderInterface
{
    /**
     * @param string $orderNumber
     * @return CallBuilderInterface
     */
    public function setOrderNumber(string $orderNumber): CallBuilderInterface;

    /**
     * @param string $callerNumber
     * @return CallBuilderInterface
     */
    public function setCallerNumber(string $callerNumber): CallBuilderInterface;

    /**
     * @return Call
     */
    public function getResult(): Call;
}