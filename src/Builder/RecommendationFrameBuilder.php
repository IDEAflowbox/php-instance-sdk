<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

class RecommendationFrameBuilder implements RecommendationFrameBuilderInterface
{
    public function buildAdvancedRecommendationFrame(): AdvancedRecommendationFrameBuilderInterface
    {
        return new AdvancedRecommendationFrameBuilder();
    }

    public function buildSimpleRecommendationFrame(): SimpleRecommendationFrameBuilderInterface
    {
        return new SimpleRecommendationFrameBuilder();
    }
}