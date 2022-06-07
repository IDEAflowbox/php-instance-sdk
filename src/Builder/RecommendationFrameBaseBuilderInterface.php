<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\RecommendationFrame;

/**
 * Interface RecommendationFrameBaseBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface RecommendationFrameBaseBuilderInterface
{
    /**
     * @param string $name
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function setName(string $name): RecommendationFrameBaseBuilderInterface;

    /**
     * @param string $groupId
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function setGroupId(string $groupId): RecommendationFrameBaseBuilderInterface;

    /**
     * @param int $numberOfProducts
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function setNumberOfProducts(int $numberOfProducts): RecommendationFrameBaseBuilderInterface;

    /**
     * @param int $minimalStock
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function setMinimalStock(int $minimalStock): RecommendationFrameBaseBuilderInterface;

    /**
     * @param string $xpath
     * @return RecommendationFrameBaseBuilderInterface
     * @deprecated Will be removed since 1.5.0. Use addRenderSettings() instead.
     */
    public function setXPath(string $xpath): RecommendationFrameBaseBuilderInterface;

    /**
     * @param string $xpath
     * @param string $xpathInjectionPosition
     * @param string|null $filter
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function addRenderSettings(string $xpath, string $xpathInjectionPosition, ?string $filter = null): RecommendationFrameBaseBuilderInterface;

    /**
     * @return RecommendationFrame
     */
    public function getResult(): RecommendationFrame;
}