<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

use Cyberkonsultant\DTO\Group\Criteria;

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
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * Product constructor.
     * @param string $id
     * @param string $code
     * @param string $name
     * @param string|null $image
     * @param string|null $description
     * @param float $netPrice
     * @param float $grossPrice
     * @param string $url
     * @param Category[] $categories
     * @param \DateTime $createdAt
     * @param \DateTime $updatedAt
     */
    public function __construct(
        string $id,
        string $code,
        string $name,
        ?string $image,
        ?string $description,
        float $netPrice,
        float $grossPrice,
        string $url,
        array $categories,
        \DateTime $createdAt,
        \DateTime $updatedAt
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
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getId(): string
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
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }
}