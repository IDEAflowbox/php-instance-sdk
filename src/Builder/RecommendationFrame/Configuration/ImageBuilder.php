<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Image;

/**
 * Class ImageBuilderInterface
 *
 * @package Cyberkonsultant
 */
class ImageBuilder implements ImageBuilderInterface
{
    /**
     * @var string
     */
    protected $width;
    
    /**
     * @var string
     */
    protected $height;

    /**
     * @var ConfigurationBuilderInterface
     */
    protected $parent;

    public function __construct(ConfigurationBuilderInterface $parent)
    {
        $this->parent = $parent;
    }
    
    /**
     * @param string $width
     * @return ImageBuilderInterface
     */
    public function setWidth(string $width): ImageBuilderInterface
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param string $height
     * @return ImageBuilderInterface
     */
    public function setHeight(string $height): ImageBuilderInterface
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return Image
     */
    public function getResult(): Image
    {
        $image = new Image();
        $image->setWidth($this->width);
        $image->setHeight($this->height);
        return $image;
    }

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endImageBuilder(): ConfigurationBuilderInterface
    {
        return $this->parent;
    }
}