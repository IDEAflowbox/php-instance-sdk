<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

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
     * @var string
     */
    protected $sidePadding;

    /**
     * @var string
     */
    protected $marginBottom;

    /**
     * @var string
     */
    protected $marginBetween;

    /**
     * @var ConfigurationBuilderInterface
     */
    protected $parent;

    public function __construct(ConfigurationBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    public function setSidePadding(string $sidePadding): FrameBuilderInterface
    {
        $this->sidePadding = $sidePadding;
        return $this;
    }

    public function setMarginBottom(string $marginBottom): FrameBuilderInterface
    {
        $this->marginBottom = $marginBottom;
        return $this;
    }

    public function setMarginBetween(string $marginBetween): FrameBuilderInterface
    {
        $this->marginBetween = $marginBetween;
        return $this;
    }

    /**
     * @return Frame
     */
    public function getResult(): Frame
    {
        $frame = new Frame();
        $frame->setSidePadding($this->sidePadding);
        $frame->setMarginBottom($this->marginBottom);
        $frame->setMarginBetween($this->marginBetween);
        return $frame;
    }

    public function endFrameBuilder(): ConfigurationBuilderInterface
    {
        return $this->parent;
    }
}