<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\Button;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\ButtonBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Button\Dimensions;
use Cyberkonsultant\Exception\CyberkonsultantSDKException;

/**
 * Class DimensionsBuilder
 *
 * @package Cyberkonsultant
 */
class DimensionsBuilder implements DimensionsBuilderInterface
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
     * @var ButtonBuilderInterface
     */
    protected $parent;

    /**
     * DimensionsBuilder constructor.
     * @param ButtonBuilderInterface $parent
     */
    public function __construct(ButtonBuilderInterface $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @param string $width
     * @return DimensionsBuilderInterface
     */
    public function setWidth(string $width): DimensionsBuilderInterface
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param string $height
     * @return DimensionsBuilderInterface
     */
    public function setHeight(string $height): DimensionsBuilderInterface
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return Dimensions
     * @throws CyberkonsultantSDKException
     */
    public function getResult(): Dimensions
    {
        if ($this->width === null || $this->height === null) {
            throw new CyberkonsultantSDKException('Properties `width` and `height` are both required in the frame button dimensions scope');
        }

        return new Dimensions(
            $this->width,
            $this->height
        );
    }

    /**
     * @return ButtonBuilderInterface
     */
    public function endDimensionsBuilder(): ButtonBuilderInterface
    {
        return $this->parent;
    }
}