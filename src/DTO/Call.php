<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

/**
 * Class Call
 *
 * @package Cyberkonsultant
 */
class Call
{
    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var string
     */
    protected $orderNumber;

    /**
     * @var string
     */
    protected $callerNumber;

    /**
     * @var bool
     */
    protected $processed = false;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    /**
     * @return string
     */
    public function getCallerNumber(): string
    {
        return $this->callerNumber;
    }

    /**
     * @return bool
     */
    public function isProcessed(): bool
    {
        return $this->processed;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $orderNumber
     */
    public function setOrderNumber(string $orderNumber): void
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @param string $callerNumber
     */
    public function setCallerNumber(string $callerNumber): void
    {
        $this->callerNumber = $callerNumber;
    }

    /**
     * @param bool $processed
     */
    public function setProcessed(bool $processed): void
    {
        $this->processed = $processed;
    }
}