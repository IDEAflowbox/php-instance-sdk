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
     * @param string $xpath
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function setXpath(string $xpath): RecommendationFrameBaseBuilderInterface
    {
        $this->xpath = $xpath;
        return $this;
    }
}