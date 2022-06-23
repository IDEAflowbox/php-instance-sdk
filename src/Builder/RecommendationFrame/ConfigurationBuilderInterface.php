<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\AnimationsBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\ArrowBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\ButtonBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\EnabledElementsBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\ImageBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\MatrixBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\ProductBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrameBaseBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Interface ConfigurationBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface ConfigurationBuilderInterface
{
    /**
     * @return MatrixBuilderInterface
     */
    public function getMatrixBuilder(): MatrixBuilderInterface;

    /**
     * @return EnabledElementsBuilderInterface
     */
    public function getEnabledElementsBuilder(): EnabledElementsBuilderInterface;

    /**
     * @return ImageBuilderInterface
     */
    public function getImageBuilder(): ImageBuilderInterface;

    /**
     * @return FrameBuilderInterface
     */
    public function getFrameBuilder(): FrameBuilderInterface;

    /**
     * @return ProductBuilderInterface
     */
    public function getProductBuilder(): ProductBuilderInterface;

    /**
     * @return ArrowBuilderInterface
     */
    public function getArrowBuilder(): ArrowBuilderInterface;

    /**
     * @return ButtonBuilderInterface
     */
    public function getButtonBuilder(): ButtonBuilderInterface;

    /**
     * @return AnimationsBuilderInterface
     */
    public function getAnimationsBuilder(): AnimationsBuilderInterface;

    /**
     * @return Configuration
     */
    public function getResult(): Configuration;

    /**
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function endConfigurationBuilder(): RecommendationFrameBaseBuilderInterface;
}