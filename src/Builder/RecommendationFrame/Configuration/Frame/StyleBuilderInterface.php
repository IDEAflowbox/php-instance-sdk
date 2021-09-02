<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration\Frame;

use Cyberkonsultant\Builder\RecommendationFrame\Configuration\FrameBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame\Style;

interface StyleBuilderInterface
{
    public function setBackgroundColor(string $backgroundColor): StyleBuilderInterface;
    public function setBorderColor(string $borderColor): StyleBuilderInterface;
    public function setBorderColorOnHover(string $borderColorOnHover): StyleBuilderInterface;
    public function getResult(): Style;
    public function endStyleBuilder(): FrameBuilderInterface;
}