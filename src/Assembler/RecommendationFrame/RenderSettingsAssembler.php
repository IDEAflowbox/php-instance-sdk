<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame;

use Cyberkonsultant\DTO\RecommendationFrame\RenderSettings;

/**
 * Class RenderSettingsAssembler
 *
 * @package Cyberkonsultant
 */
class RenderSettingsAssembler
{
    /**
     * @param RenderSettings $renderSettingsDTO
     * @return array
     */
    public function readDTO(RenderSettings $renderSettingsDTO): array
    {
        return [
            'xpath' => $renderSettingsDTO->getXpath(),
            'xpath_injection_position' => $renderSettingsDTO->getXpathInjectionPosition(),
            'filter' => $renderSettingsDTO->getFilter(),
            'priority' => $renderSettingsDTO->getPriority(),
        ];
    }

    /**
     * @param array $renderSettings
     * @return RenderSettings
     */
    public function writeDTO(array $renderSettings): RenderSettings
    {
        $renderSettingsDto = new RenderSettings();
        $renderSettingsDto->setXpath($renderSettings['xpath']);
        $renderSettingsDto->setXpathInjectionPosition($renderSettings['xpath_injection_position']);
        $renderSettingsDto->setFilter($renderSettings['filter']);
        $renderSettingsDto->setPriority($renderSettings['priority']);
        return $renderSettingsDto;
    }
}