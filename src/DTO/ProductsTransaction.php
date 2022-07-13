<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

/**
 * Class ProductsTransaction
 *
 * @package Cyberkonsultant
 */
class ProductsTransaction
{
    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $status;

    /**
     * @var string|null
     */
    protected $error;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * @param string|null $error
     */
    public function setError(?string $error): void
    {
        $this->error = $error;
    }
}