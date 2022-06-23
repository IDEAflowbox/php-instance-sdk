<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\EnabledElements;

/**
 * Class EnabledElementsBuilder
 *
 * @package Cyberkonsultant
 */
class EnabledElementsBuilder implements EnabledElementsBuilderInterface
{
    /**
     * @var bool
     */
    protected $image = true;

    /**
     * @var bool
     */
    protected $productName = true;

    /**
     * @var bool
     */
    protected $price = true;

    /**
     * @var bool
     */
    protected $button = true;

    /**
     * @var ConfigurationBuilderInterface
     */
    protected $parent;

    public function __construct(ConfigurationBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    public function setImage(bool $image): EnabledElementsBuilderInterface
    {
        $this->image = $image;
        return $this;
    }

    public function setProductName(bool $productName): EnabledElementsBuilderInterface
    {
        $this->productName = $productName;
        return $this;
    }

    public function setPrice(bool $price): EnabledElementsBuilderInterface
    {
        $this->price = $price;
        return $this;
    }

    public function setButton(bool $button): EnabledElementsBuilderInterface
    {
        $this->button = $button;
        return $this;
    }

    public function getResult(): EnabledElements
    {
        $enabledElements = new EnabledElements();
        $enabledElements->setImage($this->image);
        $enabledElements->setProductName($this->productName);
        $enabledElements->setPrice($this->price);
        $enabledElements->setButton($this->button);
        return $enabledElements;
    }

    public function endEnabledElementsBuilder(): ConfigurationBuilderInterface
    {
        return $this->parent;
    }
}