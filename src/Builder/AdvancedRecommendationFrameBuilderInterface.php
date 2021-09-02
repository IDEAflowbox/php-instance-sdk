<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

interface AdvancedRecommendationFrameBuilderInterface extends RecommendationFrameBaseBuilderInterface
{
    public function setCustomHtml(string $customHtml): void;
}