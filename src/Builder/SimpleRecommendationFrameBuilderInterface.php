<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;

/**
 * Interface SimpleRecommendationFrameBuilderInterface
 *
 * @package Cyberkonsultant
 * @method SimpleRecommendationFrameBuilderInterface setName(string $name)
 * @method SimpleRecommendationFrameBuilderInterface setGroupId(string $groupId)
 * @method SimpleRecommendationFrameBuilderInterface setNumberOfProducts(int $numberOfProducts)
 */
interface SimpleRecommendationFrameBuilderInterface extends RecommendationFrameBaseBuilderInterface
{
    /**
     * @return ConfigurationBuilderInterface
     */
    public function getConfigurationBuilder(): ConfigurationBuilderInterface;
}