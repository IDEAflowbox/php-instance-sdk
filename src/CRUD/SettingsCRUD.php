<?php
declare(strict_types=1);

namespace Cyberkonsultant\CRUD;

use Cyberkonsultant\Assembler\SettingsAssembler;
use Cyberkonsultant\DTO\Sender;
use Cyberkonsultant\DTO\Settings;

/**
 * Class SettingsCRUD
 *
 * @package Cyberkonsultant
 */
class SettingsCRUD extends BaseCRUD
{
    /**
     * @param string $metaKey
     * @return Settings
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function get(string $metaKey): Settings
    {
        $response = $this->cyberkonsultant->get(sprintf('/misc/settings?meta_key=%s', $metaKey));
        return $this->cyberkonsultant->getEdgeResponse($response, SettingsAssembler::class);
    }

    /**
     * @param string $metaKey
     * @param string|null $metaValue
     * @return Settings
     * @throws \Cyberkonsultant\Exception\ClientException
     * @throws \Cyberkonsultant\Exception\CyberkonsultantSDKException
     * @throws \Cyberkonsultant\Exception\ServerException
     * @throws \Unirest\Exception
     */
    public function update(string $metaKey, ?string $metaValue): Settings
    {
        $response = $this->cyberkonsultant->post('/misc/settings', [
            'json' => [
                'meta_key' => $metaKey,
                'meta_value' => $metaValue,
            ]
        ]);

        return $this->cyberkonsultant->getEdgeResponse($response, SettingsAssembler::class);
    }
}