<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

/**
 * Interface RecommendationFrameBaseBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface RecommendationFrameBuilderInterface
{
    /**
     * @return AdvancedRecommendationFrameBuilderInterface
     */
    public function buildAdvancedRecommendationFrame(): AdvancedRecommendationFrameBuilderInterface;

    /**
     * @return SimpleRecommendationFrameBuilderInterface
     */
    public function buildSimpleRecommendationFrame(): SimpleRecommendationFrameBuilderInterface;
}