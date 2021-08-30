<?php

namespace App\Entity;

use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\UuidTrait;
use App\Repository\BillingItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BillingItemRepository::class)
 */
class BillingItem
{
    use UuidTrait;
    use TimestampableTrait;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="billingItems")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private ?Client $client = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[Assert\NotBlank]
    private ?string $name = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Assert\Positive]
    #[Assert\Type(type: 'integer')]
    private ?int $quantity = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Assert\PositiveOrZero]
    #[Assert\Type(type: 'integer')]
    private ?int $unitPrice = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Assert\PositiveOrZero]
    #[Assert\Type(type: 'integer')]
    private ?int $valueNet = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Assert\PositiveOrZero]
    #[Assert\Type(type: 'integer')]
    private ?int $valueVat = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Assert\PositiveOrZero]
    #[Assert\Type(type: 'integer')]
    private ?int $valueGross = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Assert\PositiveOrZero]
    #[Assert\Type(type: 'integer')]
    private ?int $vatRate = null;

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

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
