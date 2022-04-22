<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

/**
 * Class Product
 *
 * @package Cyberkonsultant
 */
class Product
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $parentId = null;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $currency = null;

    /**
     * @var string|null
     */
    protected $sku = null;

    /**
     * @var string|null
     */
    protected $image = null;

    /**
     * @var string|null
     */
    protected $description = null;

    /**
     * @var float
     */
    protected $netPrice;

    /**
     * @var float
     */
    protected $grossPrice;

    /**
     * @var float|null
     */
    protected $grossSalePrice = null;

    /**
     * @var int
     */
    protected $stock = 0;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var \DateTime|null
     */
    protected $createdAt = null;

    /**
     * @var \DateTime|null
     */
    protected $updatedAt = null;

    /**
     * @var \DateTime|null
     */
    protected $deletedAt = null;

    /**
     * @var Category[]
     */
    protected $categories = [];

    /**
     * @var []ProductFeature
     */
    protected $features = [];

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    /**
     * @param string|null $parentId
     */
    public function setParentId(?string $parentId): void
    {
        $this->parentId = $parentId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     */
    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     */
    public function setSku(?string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function getNetPrice(): float
    {
        return $this->netPrice;
    }

    /**
     * @return float
     */
    public function getGrossPrice(): float
    {
        return $this->grossPrice;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param float $netPrice
     */
    public function setNetPrice(float $netPrice): void
    {
        $this->netPrice = $netPrice;
    }

    /**
     * @param float $grossPrice
     */
    public function setGrossPrice(float $grossPrice): void
    {
        $this->grossPrice = $grossPrice;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @param Category[] $categories
     */
    public function setCategories(array $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return mixed
     */
    public function getFeatures(): array
    {
        return $this->features;
    }

    /**
     * @param mixed $features
     */
    public function setFeatures(array $features): void
    {
        $this->features = $features;
    }

    /**
     * @return float|null
     */
    public function getGrossSalePrice(): ?float
    {
        return $this->grossSalePrice;
    }

    /**
     * @param float|null $grossSalePrice
     */
    public function setGrossSalePrice(?float $grossSalePrice): void
    {
        $this->grossSalePrice = $grossSalePrice;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return \DateTime|null
     */
    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime|null $deletedAt
     */
    public function setDeletedAt(?\DateTime $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime|null $createdAt
     */
    public function setCreatedAt(?\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime|null $updatedAt
     */
    public function setUpdatedAt(?\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}