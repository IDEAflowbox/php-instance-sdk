<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration;
use Cyberkonsultant\DTO\RecommendationFrame\RenderSettings;

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
     * @deprecated
     */
    protected $xpath;

    /**
     * @var array|[]RenderSettings
     */
    protected $renderSettings = [];

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
     * @deprecated Will be removed since 1.5.0. Use addRenderSettings() instead.
     */
    public function setXpath(string $xpath): RecommendationFrameBaseBuilderInterface
    {
        $this->xpath = $xpath;
        return $this;
    }

    /**
     * @param string $xpath
     * @param string $xpathInjectionPosition
     * @param string|null $filter
     * @param int $priority
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function addRenderSettings(string $xpath, string $xpathInjectionPosition, ?string $filter = null, int $priority = 0): RecommendationFrameBaseBuilderInterface
    {
        $renderSettings = new RenderSettings();
        $renderSettings->setXpath($xpath);
        $renderSettings->setXpathInjectionPosition($xpathInjectionPosition);
        $renderSettings->setFilter($filter);
        $renderSettings->setPriority($priority);

        $this->renderSettings[] = $renderSettings;
        return $this;
    }
}