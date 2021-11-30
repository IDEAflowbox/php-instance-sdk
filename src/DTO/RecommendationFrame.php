<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Class RecommendationFrame
 *
 * @package Cyberkonsultant
 */
class RecommendationFrame
{
    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $groupId;

    /**
     * @var string
     */
    protected $frameType;

    /**
     * @var int
     */
    protected $numberOfProducts = 0;

    /**
     * @var int
     */
    protected $minimalStock = 0;

    /**
     * @var string|null
     */
    protected $customHtml;

    /**
     * @var string
     */
    protected $xpath;

    /**
     * @var Configuration|null
     */
    protected $configuration;

    public function __construct(?string $type = null)
    {
        $this->frameType = $type;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }

    /**
     * @param string|null $groupId
     */
    public function setGroupId(?string $groupId): void
    {
        $this->groupId = $groupId;
    }

    /**
     * @return string
     */
    public function getFrameType(): string
    {
        return $this->frameType;
    }

    /**
     * @param string $frameType
     */
    public function setFrameType(string $frameType): void
    {
        $this->frameType = $frameType;
    }

    /**
     * @return int
     */
    public function getNumberOfProducts(): int
    {
        return $this->numberOfProducts;
    }

    /**
     * @param int $numberOfProducts
     */
    public function setNumberOfProducts(int $numberOfProducts): void
    {
        $this->numberOfProducts = $numberOfProducts;
    }

    /**
     * @return int
     */
    public function getMinimalStock(): int
    {
        return $this->minimalStock;
    }

    /**
     * @param int $minimalStock
     */
    public function setMinimalStock(int $minimalStock): void
    {
        $this->minimalStock = $minimalStock;
    }

    /**
     * @return string|null
     */
    public function getCustomHtml(): ?string
    {
        return $this->customHtml;
    }

    /**
     * @param string|null $customHtml
     */
    public function setCustomHtml(?string $customHtml): void
    {
        $this->customHtml = $customHtml;
    }

    /**
     * @return string
     */
    public function getXpath(): string
    {
        return $this->xpath;
    }

    /**
     * @param string $xpath
     */
    public function setXpath(string $xpath): void
    {
        $this->xpath = $xpath;
    }

    /**
     * @return Configuration|null
     */
    public function getConfiguration(): ?Configuration
    {
        return $this->configuration;
    }

    /**
     * @param Configuration|null $configuration
     */
    public function setConfiguration(?Configuration $configuration): void
    {
        $this->configuration = $configuration;
    }
}