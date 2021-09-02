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
    public function buildAdvancedRecommendationFrame(): AdvancedRecommendationFrameBuilderInterface;
    public function buildSimpleRecommendationFrame(): SimpleRecommendationFrameBuilderInterface;
}