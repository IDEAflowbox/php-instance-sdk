<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\EnabledElementsBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\MatrixBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\NavigationBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\TextBuilderInterface;
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
     * @return NavigationBuilderInterface
     */
    public function getNavigationBuilder(): NavigationBuilderInterface;

    /**
     * @return TextBuilderInterface
     */
    public function getTextBuilder(): TextBuilderInterface;

    /**
     * @return FrameBuilderInterface
     */
    public function getFrameBuilder(): FrameBuilderInterface;

    /**
     * @return Configuration
     */
    public function getResult(): Configuration;

    /**
     * @return RecommendationFrameBaseBuilderInterface
     */
    public function endConfigurationBuilder(): RecommendationFrameBaseBuilderInterface;
}