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
    protected $groupId = null;

    /**
     * @var int
     */
    protected $numberOfProducts;

    /**
     * @var int
     */
    protected $minimalStock = 0;

    /**
     * @var string
     */
    protected $xpath;

    /**
     * @param string $name
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function setName(string $name): RecommendationFrameBaseBuilderInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string|null $groupId
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function setGroupId(?string $groupId): RecommendationFrameBaseBuilderInterface
    {
        $this->groupId = $groupId;
        return $this;
    }

    /**
     * @param int $numberOfProducts
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function setNumberOfProducts(int $numberOfProducts): RecommendationFrameBaseBuilderInterface
    {
        $this->numberOfProducts = $numberOfProducts;
        return $this;
    }

    /**
     * @param int $minimalStock
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function setMinimalStock(int $minimalStock): RecommendationFrameBaseBuilderInterface
    {
        $this->minimalStock = $minimalStock;
        return $this;
    }

    /**
     * @param string $xpath
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function setXpath(string $xpath): RecommendationFrameBaseBuilderInterface
    {
        $this->xpath = $xpath;
        return $this;
    }
}