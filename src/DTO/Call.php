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
     * Call constructor.
     * @param string|null $id
     * @param string $orderNumber
     * @param string $callerNumber
     * @param bool $processed
     */
    public function __construct(
        ?string $id,
        string $orderNumber,
        string $callerNumber,
        bool $processed = false
    ) {
        $this->id = $id;
        $this->orderNumber = $orderNumber;
        $this->callerNumber = $callerNumber;
        $this->processed = $processed;
    }

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
}