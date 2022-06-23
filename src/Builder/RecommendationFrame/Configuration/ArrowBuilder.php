<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Arrow;

/**
 * Class EnabledElementsBuilder
 *
 * @package Cyberkonsultant
 */
class ArrowBuilder implements ArrowBuilderInterface
{
    /**
     * @var string
     */
    protected $size;

    /**
     * @var string
     */
    protected $style;

    /**
     * @var string
     */
    protected $color;

    /**
     * @var ConfigurationBuilderInterface
     */
    protected $parent;

    public function __construct(ConfigurationBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @param string $size
     * @return ArrowBuilderInterface
     */
    public function setSize(string $size): ArrowBuilderInterface
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param string $style
     * @return ArrowBuilderInterface
     */
    public function setStyle(string $style): ArrowBuilderInterface
    {
        $this->style = $style;
        return $this;
    }

    /**
     * @param string $color
     * @return ArrowBuilderInterface
     */
    public function setColor(string $color): ArrowBuilderInterface
    {
        $this->color = $color;
        return $this;
    }

    public function getResult(): Arrow
    {
        $arrow = new Arrow();
        $arrow->setSize($this->size);
        $arrow->setStyle($this->style);
        $arrow->setColor($this->color);
    }

    public function endArrowBuilder(): ConfigurationBuilderInterface
    {
        return $this->parent;
    }
}