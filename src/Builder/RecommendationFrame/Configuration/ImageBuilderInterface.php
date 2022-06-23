<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Image;

/**
 * Interface ImageBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface ImageBuilderInterface
{
    /**
     * @param string $width
     * @return ImageBuilderInterface
     */
    public function setWidth(string $width): ImageBuilderInterface;

    /**
     * @param string $height
     * @return ImageBuilderInterface
     */
    public function setHeight(string $height): ImageBuilderInterface;

    /**
     * @return Image
     */
    public function getResult(): Image;

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endImageBuilder(): ConfigurationBuilderInterface;
}