<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\DTO\Settings;

/**
 * Class SettingsAssembler
 *
 * @package Cyberkonsultant
 */
class SettingsAssembler implements DataAssemblerInterface
{
    /**
     * @param Settings $settingsDTO
     * @return array
     */
    public function readDTO(Settings $settingsDTO): array
    {
        return [
            'meta_key' => $settingsDTO->getMetaKey(),
            'meta_value' => $settingsDTO->getMetaValue(),
        ];
    }

    /**
     * @param array $settings
     * @return Settings
     */
    public function writeDTO(array $settings): Settings
    {
        $settingsDTO = new Settings();
        $settingsDTO->setMetaKey($settings['meta_key']);
        $settingsDTO->setMetaValue($settings['meta_value']);
        return $settingsDTO;
    }
}