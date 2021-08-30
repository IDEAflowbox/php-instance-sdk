<?php

namespace App\Entity;

use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\UuidTrait;
use App\Repository\InvoiceRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=InvoiceRepository::class)
 */
#[UniqueEntity('number', message: 'Invoice number already exists.', errorPath: 'number')]
class Invoice
{
    use UuidTrait;
    use TimestampableTrait;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="invoices")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private ?Client $client = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     */
    private ?string $number = null;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $fileName = null;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private ?DateTimeInterface $issuedAt = null;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private ?DateTimeInterface $dueDate = null;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private ?DateTimeInterface $deliveryDate = null;

    /**
     * @ORM\Column(type="boolean")
     */
    private ?bool $paid = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $valueNet = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $valueVat = null;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $valueGross = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $bankAccount = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $swift = null;

    /**
     * @ORM\OneToMany(targetEntity=InvoiceItem::class, mappedBy="invoice", cascade={"persist"})
     */
    private Collection $items;

    /**
     * @ORM\OneToMany(targetEntity=InvoiceAddress::class, mappedBy="invoice", cascade={"persist"})
     */
    private Collection $addresses;

    /**
     * @ORM\OneToMany(targetEntity=Payment::class, mappedBy="invoice", cascade={"persist"})
     */
    private Collection $payments;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->addresses = new ArrayCollection();
        $this->payments = new ArrayCollection();
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getIssuedAt(): ?DateTimeInterface
    {
        return $this->issuedAt;
    }

    public function setIssuedAt(?DateTimeInterface $issuedAt): self
    {
        $this->issuedAt = $issuedAt;

        return $this;
    }

    public function getDueDate(): ?DateTimeInterface
    {
        return $this->dueDate;
    }

    public function setDueDate(?DateTimeInterface $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function getDeliveryDate(): ?DateTimeInterface
    {
        return $this->deliveryDate;
    }

    public function setDeliveryDate(?DateTimeInterface $deliveryDate): self
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }

    public function getPaid(): ?bool
    {
        return $this->paid;
    }

    public function setPaid(?bool $paid): self
    {
        $this->paid = $paid;

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

    public function getBankAccount(): ?string
    {
        return $this->bankAccount;
    }

    public function setBankAccount(?string $bankAccount): self
    {
        $this->bankAccount = $bankAccount;

        return $this;
    }

    public function getSwift(): ?string
    {
        return $this->swift;
    }

    public function setSwift(?string $swift): self
    {
        $this->swift = $swift;

        return $this;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): self
    {
        $this->items = $items;

        return $this;
    }

    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function setAddresses(Collection $addresses): self
    {
        $this->addresses = $addresses;

        return $this;
    }

    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function setPayments(Collection $payments): self
    {
        $this->payments = $payments;

        return $this;
    }
}
