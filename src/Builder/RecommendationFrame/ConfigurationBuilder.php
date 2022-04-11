<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\EnabledElementsBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\EnabledElementsBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\MatrixBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\MatrixBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\NavigationBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\NavigationBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\TextBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\TextBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrameBaseBuilderInterface;
use Cyberkonsultant\Builder\SimpleRecommendationFrameBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Class ConfigurationBuilder
 *
 * @package Cyberkonsultant
 */
class ConfigurationBuilder implements ConfigurationBuilderInterface
{
    /**
     * @var MatrixBuilderInterface
     */
    protected $matrixBuilder;

    /**
     * @var EnabledElementsBuilderInterface
     */
    protected $enabledElementsBuilder;

    /**
     * @var NavigationBuilderInterface
     */
    protected $navigationBuilder;

    /**
     * @var TextBuilderInterface
     */
    protected $textBuilder;

    /**
     * @var FrameBuilderInterface
     */
    protected $frameBuilder;

    /**
     * @var SimpleRecommendationFrameBuilderInterface
     */
    protected $parent;

    /**
     * ConfigurationBuilder constructor.
     * @param SimpleRecommendationFrameBuilderInterface $parent
     */
    public function __construct(SimpleRecommendationFrameBuilderInterface $parent)
    {
        $this->parent = $parent;
        $this->matrixBuilder = new MatrixBuilder($this);
        $this->enabledElementsBuilder = new EnabledElementsBuilder($this);
        $this->navigationBuilder = new NavigationBuilder($this);
        $this->textBuilder = new TextBuilder($this);
        $this->frameBuilder = new FrameBuilder($this);
    }

    /**
     * @return MatrixBuilderInterface
     */
    public function getMatrixBuilder(): MatrixBuilderInterface
    {
        return $this->matrixBuilder;
    }

    /**
     * @return EnabledElementsBuilderInterface
     */
    public function getEnabledElementsBuilder(): EnabledElementsBuilderInterface
    {
        return $this->enabledElementsBuilder;
    }

    /**
     * @return NavigationBuilderInterface
     */
    public function getNavigationBuilder(): NavigationBuilderInterface
    {
        return $this->navigationBuilder;
    }

    /**
     * @return TextBuilderInterface
     */
    public function getTextBuilder(): TextBuilderInterface
    {
        return $this->textBuilder;
    }

    /**
     * @return FrameBuilderInterface
     */
    public function getFrameBuilder(): FrameBuilderInterface
    {
        return $this->frameBuilder;
    }

    /**
     * @return Configuration
     */
    public function getResult(): Configuration
    {
        $configuration = new Configuration();
        $configuration->setMatrix($this->getMatrixBuilder()->getResult());
        $configuration->setEnabledElements($this->getEnabledElementsBuilder()->getResult());
        $configuration->setNavigation($this->getNavigationBuilder()->getResult());
        $configuration->setText($this->getTextBuilder()->getResult());
        $configuration->setFrame($this->getFrameBuilder()->getResult());
        return $configuration;
    }

    /**
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function endConfigurationBuilder(): RecommendationFrameBaseBuilderInterface
    {
        return $this->parent;
    }
}