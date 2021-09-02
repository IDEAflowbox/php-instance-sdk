<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;

interface SimpleRecommendationFrameBuilderInterface extends RecommendationFrameBaseBuilderInterface
{
    public function getConfigurationBuilder(): ConfigurationBuilderInterface;
}