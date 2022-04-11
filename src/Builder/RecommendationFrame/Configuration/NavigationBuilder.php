<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Navigation;

/**
 * Class NavigationBuilder
 *
 * @package Cyberkonsultant
 */
class NavigationBuilder implements NavigationBuilderInterface
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

    /**
     * NavigationBuilder constructor.
     * @param ConfigurationBuilderInterface $parent
     */
    public function __construct(ConfigurationBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @param string $size
     * @return NavigationBuilderInterface
     */
    public function setSize(string $size): NavigationBuilderInterface
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param string $style
     * @return NavigationBuilderInterface
     */
    public function setStyle(string $style): NavigationBuilderInterface
    {
        $this->style = $style;
        return $this;
    }

    /**
     * @param string $color
     * @return NavigationBuilderInterface
     */
    public function setColor(string $color): NavigationBuilderInterface
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return Navigation
     */
    public function getResult(): Navigation
    {
        $navigation = new Navigation();
        $navigation->setSize($this->size);
        $navigation->setStyle($this->style);
        $navigation->setColor($this->color);
        return $navigation;
    }

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endNavigationBuilder(): ConfigurationBuilderInterface
    {
        return $this->parent;
    }
}