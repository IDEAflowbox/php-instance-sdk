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

    /**
     * RecommendationFrame constructor.
     * @param string|null $id
     * @param string $name
     * @param string|null $groupId
     * @param string $frameType
     * @param int $numberOfProducts
     * @param string|null $customHtml
     * @param string $xpath
     * @param Configuration|null $configuration
     */
    public function __construct(
        ?string $id,
        string $name,
        ?string $groupId,
        string $frameType,
        int $numberOfProducts,
        ?string $customHtml,
        string $xpath,
        ?Configuration $configuration
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->groupId = $groupId;
        $this->frameType = $frameType;
        $this->numberOfProducts = $numberOfProducts;
        $this->customHtml = $customHtml;
        $this->xpath = $xpath;
        $this->configuration = $configuration;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }

    /**
     * @return string
     */
    public function getFrameType(): string
    {
        return $this->frameType;
    }

    /**
     * @return int
     */
    public function getNumberOfProducts(): int
    {
        return $this->numberOfProducts;
    }

    /**
     * @return string|null
     */
    public function getCustomHtml(): ?string
    {
        return $this->customHtml;
    }

    /**
     * @return string
     */
    public function getXpath(): string
    {
        return $this->xpath;
    }

    /**
     * @return Configuration|null
     */
    public function getConfiguration(): ?Configuration
    {
        return $this->configuration;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string|null $groupId
     */
    public function setGroupId(?string $groupId): void
    {
        $this->groupId = $groupId;
    }

    /**
     * @param string $frameType
     */
    public function setFrameType(string $frameType): void
    {
        $this->frameType = $frameType;
    }

    /**
     * @param int $numberOfProducts
     */
    public function setNumberOfProducts(int $numberOfProducts): void
    {
        $this->numberOfProducts = $numberOfProducts;
    }

    /**
     * @param string|null $customHtml
     */
    public function setCustomHtml(?string $customHtml): void
    {
        $this->customHtml = $customHtml;
    }

    /**
     * @param string $xpath
     */
    public function setXpath(string $xpath): void
    {
        $this->xpath = $xpath;
    }

    /**
     * @param Configuration|null $configuration
     */
    public function setConfiguration(?Configuration $configuration): void
    {
        $this->configuration = $configuration;
    }
}