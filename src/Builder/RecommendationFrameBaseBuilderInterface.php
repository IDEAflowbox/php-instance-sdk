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
     */
    public function setXPath(string $xpath): RecommendationFrameBaseBuilderInterface;

    /**
     * @return RecommendationFrame
     */
    public function getResult(): RecommendationFrame;
}