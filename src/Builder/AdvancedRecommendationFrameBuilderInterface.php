<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

/**
 * Interface AdvancedRecommendationFrameBuilderInterface
 * 
 * @package Cyberkonsultant
 * @method AdvancedRecommendationFrameBuilderInterface setName(string $name)
 * @method AdvancedRecommendationFrameBuilderInterface setGroupId(string $groupId)
 * @method AdvancedRecommendationFrameBuilderInterface setNumberOfProducts(int $numberOfProducts)
 */
interface AdvancedRecommendationFrameBuilderInterface extends RecommendationFrameBaseBuilderInterface
{
    /**
     * @param string $customHtml
     */
    public function setCustomHtml(string $customHtml): AdvancedRecommendationFrameBuilderInterface;
}