<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Product;

/**
 * Interface ProductBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface ProductBuilderInterface
{
    /**
     * @param string $sidePadding
     * @return ProductBuilderInterface
     */
    public function setSidePadding(string $sidePadding): ProductBuilderInterface;

    /**
     * @param string $paddingTop
     * @return ProductBuilderInterface
     */
    public function setPaddingTop(string $paddingTop): ProductBuilderInterface;

    /**
     * @param string $paddingBottom
     * @return ProductBuilderInterface
     */
    public function setPaddingBottom(string $paddingBottom): ProductBuilderInterface;

    /**
     * @param string $borderRadius
     * @return ProductBuilderInterface
     */
    public function setBorderRadius(string $borderRadius): ProductBuilderInterface;

    /**
     * @param string $backgroundColor
     * @return ProductBuilderInterface
     */
    public function setBackgroundColor(string $backgroundColor): ProductBuilderInterface;

    /**
     * @return Product
     */
    public function getResult(): Product;

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endProductBuilder(): ConfigurationBuilderInterface;
}