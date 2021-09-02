<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Class RecommendationFrameBaseBuilder
 *
 * @package Cyberkonsultant
 */
abstract class RecommendationFrameBaseBuilder implements RecommendationFrameBaseBuilderInterface
{
    /**
     * @var Configuration|null
     */
    protected $configuration;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $groupId;

    /**
     * @var int
     */
    protected $numberOfProducts;

    /**
     * @var string
     */
    protected $xpath;

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
     * @param int $numberOfProducts
     */
    public function setNumberOfProducts(int $numberOfProducts): void
    {
        $this->numberOfProducts = $numberOfProducts;
    }

    /**
     * @param string $xpath
     */
    public function setXpath(string $xpath): void
    {
        $this->xpath = $xpath;
    }
}