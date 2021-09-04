<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Style;

/**
 * Interface StyleBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface StyleBuilderInterface
{
    /**
     * @param string $backgroundColor
     * @return StyleBuilderInterface
     */
    public function setBackgroundColor(string $backgroundColor): StyleBuilderInterface;

    /**
     * @param string $borderColor
     * @return StyleBuilderInterface
     */
    public function setBorderColor(string $borderColor): StyleBuilderInterface;

    /**
     * @param string $borderColorOnHover
     * @return StyleBuilderInterface
     */
    public function setBorderColorOnHover(string $borderColorOnHover): StyleBuilderInterface;

    /**
     * @return Style
     */
    public function getResult(): Style;

    /**
     * @return FrameBuilderInterface
     */
    public function endStyleBuilder(): FrameBuilderInterface;
}