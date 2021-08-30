<?php

namespace App\Entity;

use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\UuidTrait;
use App\Repository\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaymentRepository::class)
 */
class Payment
{
    use UuidTrait;
    use TimestampableTrait;

    /**
     * @ORM\ManyToOne(targetEntity=Invoice::class, inversedBy="payments")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private ?Invoice $invoice = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $value = null;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $description = null;

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(?Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
