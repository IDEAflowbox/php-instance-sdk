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
    protected $group_id;

    /**
     * @var string
     */
    protected $frame_type;

    /**
     * @var int
     */
    protected $number_of_products = 0;

    /**
     * @var string|null
     */
    protected $custom_html;

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
     * @param string|null $group_id
     * @param string $frame_type
     * @param int $number_of_products
     * @param string|null $custom_html
     * @param string $xpath
     * @param Configuration|null $configuration
     */
    public function __construct(
        ?string $id,
        string $name,
        ?string $group_id,
        string $frame_type,
        int $number_of_products,
        ?string $custom_html,
        string $xpath,
        ?Configuration $configuration
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->group_id = $group_id;
        $this->frame_type = $frame_type;
        $this->number_of_products = $number_of_products;
        $this->custom_html = $custom_html;
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
        return $this->group_id;
    }

    /**
     * @return string
     */
    public function getFrameType(): string
    {
        return $this->frame_type;
    }

    /**
     * @return int
     */
    public function getNumberOfProducts(): int
    {
        return $this->number_of_products;
    }

    /**
     * @return string|null
     */
    public function getCustomHtml(): ?string
    {
        return $this->custom_html;
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
     * @param string|null $group_id
     */
    public function setGroupId(?string $group_id): void
    {
        $this->group_id = $group_id;
    }

    /**
     * @param string $frame_type
     */
    public function setFrameType(string $frame_type): void
    {
        $this->frame_type = $frame_type;
    }

    /**
     * @param int $number_of_products
     */
    public function setNumberOfProducts(int $number_of_products): void
    {
        $this->number_of_products = $number_of_products;
    }

    /**
     * @param string|null $custom_html
     */
    public function setCustomHtml(?string $custom_html): void
    {
        $this->custom_html = $custom_html;
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