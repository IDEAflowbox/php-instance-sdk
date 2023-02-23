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
     * @var string|null
     */
    protected $wrapperStyles = null;

    /**
     * @var string|null
     */
    protected $titleText = null;

    /**
     * @var string|null
     */
    protected $titleWrapperStyles = null;

    /**
     * @var string|null
     */
    protected $titleStyles = null;

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

    public function setWrapperStyles(?string $wrapperStyles): FrameBuilderInterface
    {
        $this->wrapperStyles = $wrapperStyles;
        return $this;
    }

    public function setTitleText(?string $titleText): FrameBuilderInterface
    {
        $this->titleText = $titleText;
        return $this;
    }

    public function setTitleWrapperStyles(?string $titleWrapperStyles): FrameBuilderInterface
    {
        $this->titleWrapperStyles = $titleWrapperStyles;
        return $this;
    }

    public function setTitleStyles(?string $titleStyles): FrameBuilderInterface
    {
        $this->titleStyles = $titleStyles;
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
        $frame->setWrapperStyles($this->wrapperStyles);
        $frame->setTitleText($this->titleText);
        $frame->setTitleWrapperStyles($this->titleWrapperStyles);
        $frame->setTitleStyles($this->titleStyles);
        return $frame;
    }

    public function endFrameBuilder(): ConfigurationBuilderInterface
    {
        return $this->parent;
    }
}