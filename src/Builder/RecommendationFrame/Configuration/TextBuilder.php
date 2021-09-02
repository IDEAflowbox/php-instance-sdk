<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Text;

/**
 * Class TextBuilder
 *
 * @package Cyberkonsultant
 */
class TextBuilder implements TextBuilderInterface
{
    /**
     * @var string
     */
    protected $productContents;

    /**
     * @var string
     */
    protected $button;

    /**
     * @var ConfigurationBuilderInterface
     */
    protected $parent;

    /**
     * TextBuilder constructor.
     * @param ConfigurationBuilderInterface $parent
     */
    public function __construct(ConfigurationBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @param string $productContents
     * @return TextBuilderInterface
     */
    public function setProductContents(string $productContents): TextBuilderInterface
    {
        $this->productContents = $productContents;
        return $this;
    }

    /**
     * @param string $button
     * @return TextBuilderInterface
     */
    public function setButton(string $button): TextBuilderInterface
    {
        $this->button = $button;
        return $this;
    }

    /**
     * @return Text
     */
    public function getResult(): Text
    {
        return new Text(
            $this->productContents,
            $this->button
        );
    }

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endTextBuilder(): ConfigurationBuilderInterface
    {
        return $this->parent;
    }
}