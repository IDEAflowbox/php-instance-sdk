<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Animations;

/**
 * Class EnabledElementsAssembler
 *
 * @package Cyberkonsultant
 */
class AnimationsAssembler
{
    /**
     * @param Animations $animationsDTO
     * @return array
     */
    public function readDTO(Animations $animationsDTO): array
    {
        return [
            'shadow' => $animationsDTO->isShadow(),
            'scale_up' => $animationsDTO->isScaleUp(),
            'overlay' => $animationsDTO->isOverlay(),
        ];
    }

    /**
     * @param array $animations
     * @return Animations
     */
    public function writeDTO(array $animations): Animations
    {
        $animationsDto = new Animations();
        $animationsDto->setScaleUp($animations['scale_up']);
        $animationsDto->setShadow($animations['shadow']);
        $animationsDto->setOverlay($animations['overlay']);
        return $animationsDto;
    }
}