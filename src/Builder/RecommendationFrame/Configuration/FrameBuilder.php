<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\ButtonBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\ButtonBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\DimensionsBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\DimensionsBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\ImageStyleBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\ImageStyleBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\StyleBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\StyleBuilder;
use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame;

/**
 * Class FrameBuilder
 *
 * @package Cyberkonsultant
 */
class FrameBuilder implements FrameBuilderInterface
{
    /**
     * @var int
     */
    protected $borderRadius;

    /**
     * @var DimensionsBuilderInterface
     */
    protected $dimensionsBuilder;

    /**
     * @var StyleBuilderInterface
     */
    protected $styleBuilder;

    /**
     * @var ImageStyleBuilderInterface
     */
    protected $imageStyleBuilder;

    /**
     * @var ButtonBuilderInterface
     */
    protected $buttonBuilder;

    /**
     * @var ConfigurationBuilderInterface
     */
    protected $parent;

    public function __construct(ConfigurationBuilderInterface $parent)
    {
        $this->parent = $parent;
        $this->dimensionsBuilder = new DimensionsBuilder($this);
        $this->styleBuilder = new StyleBuilder($this);
        $this->imageStyleBuilder = new ImageStyleBuilder($this);
        $this->buttonBuilder = new ButtonBuilder($this);
    }

    /**
     * @param int $borderRadius
     * @return FrameBuilderInterface
     */
    public function setBorderRadius(int $borderRadius): FrameBuilderInterface
    {
        $this->borderRadius = $borderRadius;
        return $this;
    }

    /**
     * @return DimensionsBuilderInterface
     */
    public function getDimensionsBuilder(): DimensionsBuilderInterface
    {
        return $this->dimensionsBuilder;
    }

    /**
     * @return StyleBuilderInterface
     */
    public function getStyleBuilder(): StyleBuilderInterface
    {
        return $this->styleBuilder;
    }

    /**
     * @return ImageStyleBuilderInterface
     */
    public function getImageStyleBuilder(): ImageStyleBuilderInterface
    {
        return $this->imageStyleBuilder;
    }

    /**
     * @return ButtonBuilderInterface
     */
    public function getButtonBuilder(): ButtonBuilderInterface
    {
        return $this->buttonBuilder;
    }

    /**
     * @return Frame
     */
    public function getResult(): Frame
    {
        return new Frame(
            $this->borderRadius,
            $this->getDimensionsBuilder()->getResult(),
            $this->getStyleBuilder()->getResult(),
            $this->getImageStyleBuilder()->getResult(),
            $this->getButtonBuilder()->getResult()
        );
    }

    public function endFrameBuilder(): ConfigurationBuilderInterface
    {
        return $this->parent;
    }
}