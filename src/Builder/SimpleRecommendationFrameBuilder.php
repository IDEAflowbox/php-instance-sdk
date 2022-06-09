<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame;

/**
 * Class SimpleRecommendationFrameBuilder
 *
 * @package Cyberkonsultant
 */
class SimpleRecommendationFrameBuilder extends RecommendationFrameBaseBuilder implements SimpleRecommendationFrameBuilderInterface
{
    /** @var string */
    private const FRAME_TYPE = 'simple';

    /**
     * @var ConfigurationBuilder
     */
    protected $configurationBuilder;

    /**
     * SimpleRecommendationFrameBuilder constructor.
     */
    public function __construct()
    {
        $this->configurationBuilder = new ConfigurationBuilder($this);
    }

    /**
     * @return ConfigurationBuilderInterface
     */
    public function getConfigurationBuilder(): ConfigurationBuilderInterface
    {
        return $this->configurationBuilder;
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
        $recommendationFrame->setConfiguration($this->getConfigurationBuilder()->getResult());
        return $recommendationFrame;
    }
}