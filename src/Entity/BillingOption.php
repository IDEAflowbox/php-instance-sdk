<?php

namespace App\Entity;

use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\UuidTrait;
use App\Repository\BillingOptionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BillingOptionRepository::class)
 */
class BillingOption
{
    use UuidTrait;
    use TimestampableTrait;

    /**
     * @ORM\OneToOne(targetEntity=Client::class, inversedBy="billingOption")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private ?Client $client = null;

    /**
     * @ORM\ManyToOne(targetEntity=IssuerAddress::class)
     * @ORM\JoinColumn(nullable=false)
     */
    #[Assert\NotNull]
    private ?IssuerAddress $issuerAddress = null;

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getIssuerAddress(): ?IssuerAddress
    {
        return $this->issuerAddress;
    }

    public function setIssuerAddress(?IssuerAddress $issuerAddress): self
    {
        $this->issuerAddress = $issuerAddress;

        return $this;
    }
}
