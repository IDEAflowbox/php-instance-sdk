<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\ImageStyle;

interface ImageStyleBuilderInterface
{
    public function setHeight(string $height): ImageStyleBuilderInterface;
    public function setBackgroundColor(string $backgroundColor): ImageStyleBuilderInterface;
    public function getResult(): ImageStyle;
    public function endImageStyleBuilder(): FrameBuilderInterface;
}