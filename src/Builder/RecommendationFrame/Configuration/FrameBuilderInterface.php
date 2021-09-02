<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\DimensionsBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\StyleBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\ImageStyleBuilderInterface;
use Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame\ButtonBuilderInterface;

interface FrameBuilderInterface
{
    public function setBorderRadius(int $borderRadius): FrameBuilderInterface;
    public function getDimensionsBuilder(): DimensionsBuilderInterface;
    public function getStyleBuilder(): StyleBuilderInterface;
    public function getImageStyleBuilder(): ImageStyleBuilderInterface;
    public function getButtonBuilder(): ButtonBuilderInterface;
    public function getResult(): Frame;
    public function endFrameBuilder(): ConfigurationBuilderInterface;
}