<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

/**
 * Class RecommendationFrameBuilder
 *
 * @package Cyberkonsultant
 */
class RecommendationFrameBuilder implements RecommendationFrameBuilderInterface
{
    /**
     * @return AdvancedRecommendationFrameBuilderInterface
     */
    public function buildAdvancedRecommendationFrame(): AdvancedRecommendationFrameBuilderInterface
    {
        return new AdvancedRecommendationFrameBuilder();
    }

    /**
     * @return SimpleRecommendationFrameBuilderInterface
     */
    public function buildSimpleRecommendationFrame(): SimpleRecommendationFrameBuilderInterface
    {
        return new SimpleRecommendationFrameBuilder();
    }
}