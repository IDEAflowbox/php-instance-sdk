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
class ProductBuilder implements ProductBuilderInterface
{
    /**
     * @var string
     */
    protected $sidePadding;

    /**
     * @var string
     */
    protected $paddingTop;

    /**
     * @var string
     */
    protected $paddingBottom;

    /**
     * @var string
     */
    protected $borderRadius;

    /**
     * @var string
     */
    protected $backgroundColor;

    /**
     * @var ConfigurationBuilderInterface
     */
    protected $parent;

    /**
     * MatrixBuilder constructor.
     * @param ConfigurationBuilderInterface $parent
     */
    public function __construct(ConfigurationBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @param string $sidePadding
     * @return ProductBuilderInterface
     */
    public function setSidePadding(string $sidePadding): ProductBuilderInterface
    {
        $this->sidePadding = $sidePadding;
        return $this;
    }

    /**
     * @param string $paddingTop
     * @return ProductBuilderInterface
     */
    public function setPaddingTop(string $paddingTop): ProductBuilderInterface
    {
        $this->paddingTop = $paddingTop;
        return $this;
    }

    /**
     * @param string $paddingBottom
     * @return ProductBuilderInterface
     */
    public function setPaddingBottom(string $paddingBottom): ProductBuilderInterface
    {
        $this->paddingBottom = $paddingBottom;
        return $this;
    }

    /**
     * @param string $borderRadius
     * @return ProductBuilderInterface
     */
    public function setBorderRadius(string $borderRadius): ProductBuilderInterface
    {
        $this->borderRadius = $borderRadius;
        return $this;
    }

    /**
     * @param string $backgroundColor
     * @return ProductBuilderInterface
     */
    public function setBackgroundColor(string $backgroundColor): ProductBuilderInterface
    {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    /**
     * @return Product
     */
    public function getResult(): Product
    {
        $product = new Product();
        $product->setSidePadding($this->sidePadding);
        $product->setPaddingTop($this->paddingTop);
        $product->setPaddingBottom($this->paddingBottom);
        $product->setBorderRadius($this->borderRadius);
        $product->setBackgroundColor($this->backgroundColor);
        return $product;
    }

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endProductBuilder(): ConfigurationBuilderInterface
    {
        return $this->parent;
    }
}