<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\ImageStyle;

/**
 * Class ImageStyleBuilder
 *
 * @package Cyberkonsultant
 */
class ImageStyleBuilder implements ImageStyleBuilderInterface
{
    /**
     * @var string
     */
    protected $height;

    /**
     * @var string
     */
    protected $backgroundColor;

    /**
     * @var FrameBuilderInterface
     */
    protected $parent;

    public function __construct(FrameBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @param string $height
     * @return ImageStyleBuilderInterface
     */
    public function setHeight(string $height): ImageStyleBuilderInterface
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param string $backgroundColor
     * @return ImageStyleBuilderInterface
     */
    public function setBackgroundColor(string $backgroundColor): ImageStyleBuilderInterface
    {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    /**
     * @return ImageStyle
     */
    public function getResult(): ImageStyle
    {
        return new ImageStyle(
            $this->height,
            $this->backgroundColor
        );
    }

    /**
     * @return FrameBuilderInterface
     */
    public function endImageStyleBuilder(): FrameBuilderInterface
    {
        return $this->parent;
    }
}