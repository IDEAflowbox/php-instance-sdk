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
     * @var string|null
     */
    protected $id;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $image;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var float
     */
    protected $netPrice;

    /**
     * @var float
     */
    protected $grossPrice;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var Category[]
     */
    protected $categories = [];

    /**
     * Product constructor.
     * @param string|null $id
     * @param string $code
     * @param string $name
     * @param string|null $image
     * @param string|null $description
     * @param float $netPrice
     * @param float $grossPrice
     * @param string $url
     * @param Category[] $categories
     */
    public function __construct(
        ?string $id,
        string $code,
        string $name,
        ?string $image,
        ?string $description,
        float $netPrice,
        float $grossPrice,
        string $url,
        array $categories
    ) {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->netPrice = $netPrice;
        $this->grossPrice = $grossPrice;
        $this->url = $url;
        $this->categories = $categories;
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
    public function getCode(): string
    {
        return $this->code;
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
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
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
}