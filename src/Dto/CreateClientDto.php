<?php

namespace App\Dto;

use App\Entity\IssuerAddress;
use Symfony\Component\Validator\Constraints as Assert;

class CreateClientDto
{
    #[Assert\NotBlank]
    private ?string $firstName = null;

    #[Assert\NotBlank]
    private ?string $lastName = null;

    #[Assert\NotBlank]
    private ?string $companyName = null;

    #[Assert\NotBlank]
    private ?string $taxId = null;

    #[Assert\NotBlank]
    private ?string $city = null;

    #[Assert\NotBlank]
    private ?string $zipCode = null;

    #[Assert\NotBlank]
    private ?string $street = null;

    #[Assert\NotBlank]
    private ?string $propertyNumber = null;

    #[Assert\NotBlank]
    private ?string $country = null;

    #[Assert\NotNull]
    private ?IssuerAddress $issuerAddress = null;

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getTaxId(): ?string
    {
        return $this->taxId;
    }

    public function setTaxId(?string $taxId): self
    {
        $this->taxId = $taxId;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getPropertyNumber(): ?string
    {
        return $this->propertyNumber;
    }

    public function setPropertyNumber(?string $propertyNumber): self
    {
        $this->propertyNumber = $propertyNumber;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

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
