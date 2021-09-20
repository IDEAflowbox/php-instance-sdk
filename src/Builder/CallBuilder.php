<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Call;

/**
 * Class CallBuilder
 *
 * @package Cyberkonsultant
 */
class CallBuilder implements CallBuilderInterface
{
    /**
     * @var string
     */
    protected $orderNumber;

    /**
     * @var string
     */
    protected $callerNumber;

    public function setOrderNumber(string $orderNumber): CallBuilderInterface
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    public function setCallerNumber(string $callerNumber): CallBuilderInterface
    {
        $this->callerNumber = $callerNumber;
        return $this;
    }

    public function getResult(): Call
    {
        return new Call(null, $this->orderNumber, $this->callerNumber);
    }
}