<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\RecommendationFrame;

/**
 * Class AdvancedRecommendationFrameBuilder
 *
 * @package Cyberkonsultant
 */
class AdvancedRecommendationFrameBuilder extends RecommendationFrameBaseBuilder implements AdvancedRecommendationFrameBuilderInterface
{
    /**
     * @var string
     */
    private const FRAME_TYPE = 'advanced';

    /**
     * @var string
     */
    protected $customHtml = '';

    /**
     * @param string $customHtml
     * @return AdvancedRecommendationFrameBuilderInterface
     */
    public function setCustomHtml(string $customHtml): AdvancedRecommendationFrameBuilderInterface
    {
        $this->customHtml = $customHtml;
        return $this;
    }

    /**
     * @return RecommendationFrame
     */
    public function getResult(): RecommendationFrame
    {
        $recommendationFrame = new RecommendationFrame();
        $recommendationFrame->setFrameType(self::FRAME_TYPE);
        $recommendationFrame->setName($this->name);
        $recommendationFrame->setGroupId($this->groupId);
        $recommendationFrame->setNumberOfProducts($this->numberOfProducts);
        $recommendationFrame->setMinimalStock($this->minimalStock);
        $recommendationFrame->setCustomHtml($this->customHtml);
        $recommendationFrame->setXpath($this->xpath);
        return $recommendationFrame;
    }
}