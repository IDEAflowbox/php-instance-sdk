<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\AnimationsBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\AnimationsBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\ArrowBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\ArrowBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\ButtonBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\ButtonBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\EnabledElementsBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\EnabledElementsBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\ImageBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\ImageBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\MatrixBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\MatrixBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\ProductBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\ProductBuilderInterface;
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
     * @var ImageBuilderInterface
     */
    protected $imageBuilder;

    /**
     * @var FrameBuilderInterface
     */
    protected $frameBuilder;

    /**
     * @var ProductBuilderInterface
     */
    protected $productBuilder;

    /**
     * @var ArrowBuilderInterface
     */
    protected $arrowBuilder;

    /**
     * @var ButtonBuilderInterface
     */
    protected $buttonBuilder;

    /**
     * @var AnimationsBuilderInterface
     */
    protected $animationsBuilder;

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
        $this->imageBuilder = new ImageBuilder($this);
        $this->frameBuilder = new FrameBuilder($this);
        $this->productBuilder = new ProductBuilder($this);
        $this->arrowBuilder = new ArrowBuilder($this);
        $this->buttonBuilder = new ButtonBuilder($this);
        $this->animationsBuilder = new AnimationsBuilder($this);
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
     * @return ImageBuilderInterface
     */
    public function getImageBuilder(): ImageBuilderInterface
    {
        return $this->imageBuilder;
    }

    /**
     * @return FrameBuilderInterface
     */
    public function getFrameBuilder(): FrameBuilderInterface
    {
        return $this->frameBuilder;
    }

    /**
     * @return ProductBuilderInterface
     */
    public function getProductBuilder(): ProductBuilderInterface
    {
        return $this->productBuilder;
    }

    /**
     * @return ArrowBuilderInterface
     */
    public function getArrowBuilder(): ArrowBuilderInterface
    {
        return $this->arrowBuilder;
    }

    /**
     * @return ButtonBuilderInterface
     */
    public function getButtonBuilder(): ButtonBuilderInterface
    {
        return $this->buttonBuilder;
    }

    /**
     * @return AnimationsBuilderInterface
     */
    public function getAnimationsBuilder(): AnimationsBuilderInterface
    {
        return $this->animationsBuilder;
    }

    /**
     * @return Configuration
     */
    public function getResult(): Configuration
    {
        $configuration = new Configuration();
        $configuration->setMatrix($this->getMatrixBuilder()->getResult());
        $configuration->setEnabledElements($this->getEnabledElementsBuilder()->getResult());
        $configuration->setImage($this->getImageBuilder()->getResult());
        $configuration->setFrame($this->getFrameBuilder()->getResult());
        $configuration->setProduct($this->getProductBuilder()->getResult());
        $configuration->setArrow($this->getArrowBuilder()->getResult());
        $configuration->setButton($this->getButtonBuilder()->getResult());
        $configuration->setAnimations($this->getAnimationsBuilder()->getResult());
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