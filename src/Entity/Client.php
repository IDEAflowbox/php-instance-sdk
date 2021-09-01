<?php

namespace App\Entity;

use App\Entity\Traits\FirstNameTrait;
use App\Entity\Traits\LastNameTrait;
use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\UuidTrait;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    use UuidTrait;
    use FirstNameTrait;
    use LastNameTrait;
    use TimestampableTrait;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private bool $active = true;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="client", cascade={"persist"})
     */
    private Collection $users;

    /**
     * @ORM\OneToMany(targetEntity=Invoice::class, mappedBy="client", cascade={"persist"})
     */
    private Collection $invoices;

    /**
     * @ORM\OneToOne(targetEntity=BillingAddress::class, mappedBy="client")
     */
    private ?BillingAddress $billingAddress = null;

    /**
     * @ORM\OneToMany(targetEntity=BillingItem::class, mappedBy="client", cascade={"persist"})
     */
    private Collection $billingItems;

    /**
     * @ORM\OneToOne(targetEntity=ExternalApiConfig::class, mappedBy="client")
     */
    private ?ExternalApiConfig $externalApiConfig = null;

    /**
     * @ORM\OneToOne(targetEntity=BillingOption::class, mappedBy="client")
     */
    private ?BillingOption $billingOption = null;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->invoices = new ArrayCollection();
        $this->billingItems = new ArrayCollection();
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function setUsers(Collection $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getInvoices(): Collection
    {
        return $this->invoices;
    }

    public function setInvoices(Collection $invoices): Client
    {
        $this->invoices = $invoices;

        return $this;
    }

    public function getBillingAddress(): ?BillingAddress
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?BillingAddress $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function getBillingItems(): Collection
    {
        return $this->billingItems;
    }

    public function setBillingItems(Collection $billingItems): self
    {
        $this->billingItems = $billingItems;

        return $this;
    }

    public function getExternalApiConfig(): ?ExternalApiConfig
    {
        return $this->externalApiConfig;
    }

    public function setExternalApiConfig(?ExternalApiConfig $externalApiConfig): self
    {
        $this->externalApiConfig = $externalApiConfig;

        return $this;
    }

    public function getBillingOption(): ?BillingOption
    {
        return $this->billingOption;
    }

    public function setBillingOption(?BillingOption $billingOption): self
    {
        $this->billingOption = $billingOption;

        return $this;
    }
}
