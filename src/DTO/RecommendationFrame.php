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
     * @var \DateTime|null
     */
    protected $created_at;

    /**
     * @var \DateTime|null
     */
    protected $updated_at;

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
     * @param \DateTime|null $created_at
     * @param \DateTime|null $updated_at
     */
    public function __construct(
        ?string $id,
        string $name,
        ?string $group_id,
        string $frame_type,
        int $number_of_products,
        ?string $custom_html,
        string $xpath,
        ?Configuration $configuration,
        ?\DateTime $created_at,
        ?\DateTime $updated_at
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->group_id = $group_id;
        $this->frame_type = $frame_type;
        $this->number_of_products = $number_of_products;
        $this->custom_html = $custom_html;
        $this->xpath = $xpath;
        $this->configuration = $configuration;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
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
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updated_at;
    }
}