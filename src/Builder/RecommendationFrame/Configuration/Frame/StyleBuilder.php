<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Style;

/**
 * Class StyleBuilder
 *
 * @package Cyberkonsultant
 */
class StyleBuilder implements StyleBuilderInterface
{
    /**
     * @var string
     */
    protected $backgroundColor;

    /**
     * @var string
     */
    protected $borderColor;

    /**
     * @var string
     */
    protected $borderColorOnHover;

    /**
     * @var FrameBuilderInterface
     */
    protected $parent;

    public function __construct(FrameBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @param string $backgroundColor
     * @return StyleBuilderInterface
     */
    public function setBackgroundColor(string $backgroundColor): StyleBuilderInterface
    {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    /**
     * @param string $borderColor
     * @return StyleBuilderInterface
     */
    public function setBorderColor(string $borderColor): StyleBuilderInterface
    {
        $this->borderColor = $borderColor;
        return $this;
    }

    /**
     * @param string $borderColorOnHover
     * @return StyleBuilderInterface
     */
    public function setBorderColorOnHover(string $borderColorOnHover): StyleBuilderInterface
    {
        $this->borderColorOnHover = $borderColorOnHover;
        return $this;
    }

    /**
     * @return Style
     */
    public function getResult(): Style
    {
        $style = new Style();
        $style->setBackgroundColor($this->backgroundColor);
        $style->setBorderColor($this->borderColor);
        $style->setBorderColorOnHover($this->borderColorOnHover);
        return $style;
    }

    /**
     * @return FrameBuilderInterface
     */
    public function endStyleBuilder(): FrameBuilderInterface
    {
        return $this->parent;
    }
}