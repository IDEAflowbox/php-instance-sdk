<?php

namespace App\Entity;

use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\UuidTrait;
use App\Repository\InvoiceItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=InvoiceItemRepository::class)
 */
class InvoiceItem
{
    use UuidTrait;
    use TimestampableTrait;

    /**
     * @ORM\ManyToOne(targetEntity=Invoice::class, inversedBy="items")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    #[Assert\NotNull]
    private ?Invoice $invoice = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[Assert\NotBlank]
    private ?string $name = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Assert\NotBlank]
    private ?int $quantity = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Assert\NotBlank]
    private ?int $unitPrice = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Assert\NotBlank]
    private ?int $valueNet = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Assert\NotBlank]
    private ?int $valueVat = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Assert\NotBlank]
    private ?int $valueGross = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Assert\NotBlank]
    private ?int $vatRate = null;

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(?Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnitPrice(): ?int
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(?int $unitPrice): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getValueNet(): ?int
    {
        return $this->valueNet;
    }

    public function setValueNet(?int $valueNet): self
    {
        $this->valueNet = $valueNet;

        return $this;
    }

    public function getValueVat(): ?int
    {
        return $this->valueVat;
    }

    public function setValueVat(?int $valueVat): self
    {
        $this->valueVat = $valueVat;

        return $this;
    }

    public function getValueGross(): ?int
    {
        return $this->valueGross;
    }

    public function setValueGross(?int $valueGross): self
    {
        $this->valueGross = $valueGross;

        return $this;
    }

    public function getVatRate(): ?int
    {
        return $this->vatRate;
    }

    public function setVatRate(?int $vatRate): self
    {
        $this->vatRate = $vatRate;

        return $this;
    }
}
