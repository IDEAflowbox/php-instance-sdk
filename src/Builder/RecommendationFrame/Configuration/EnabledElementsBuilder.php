<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\EnabledElements;

class EnabledElementsBuilder implements EnabledElementsBuilderInterface
{
    /**
     * @var bool
     */
    protected $thumbnail = true;

    /**
     * @var bool
     */
    protected $button = true;

    /**
     * @var bool
     */
    protected $contents = true;

    /**
     * @var ConfigurationBuilderInterface
     */
    protected $parent;

    public function __construct(ConfigurationBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    public function setThumbnail(bool $thumbnail): EnabledElementsBuilderInterface
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function setButton(bool $button): EnabledElementsBuilderInterface
    {
        $this->button = $button;
        return $this;
    }

    public function setContents(bool $contents): EnabledElementsBuilderInterface
    {
        $this->contents = $contents;
        return $this;
    }

    public function getResult(): EnabledElements
    {
        return new EnabledElements(
            $this->thumbnail,
            $this->button,
            $this->contents
        );
    }

    public function endEnabledElementsBuilder(): ConfigurationBuilderInterface
    {
        return $this->parent;
    }
}