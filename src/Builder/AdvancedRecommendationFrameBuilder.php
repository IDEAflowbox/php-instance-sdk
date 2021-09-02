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
     */
    public function setCustomHtml(string $customHtml): void
    {
        $this->customHtml = $customHtml;
    }

    /**
     * @return RecommendationFrame
     */
    public function getResult(): RecommendationFrame
    {
        return new RecommendationFrame(
            null,
            $this->name,
            $this->groupId,
            self::FRAME_TYPE,
            $this->numberOfProducts,
            $this->customHtml,
            $this->xpath,
            $this->configuration,
            null,
            null
        );
    }
}