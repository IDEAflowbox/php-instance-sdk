<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\Assembler\RecommendationFrame\ConfigurationAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\RenderSettingsAssembler;
use Cyberkonsultant\DTO\RecommendationFrame;

/**
 * Class RecommendationFrameAssembler
 *
 * @package Cyberkonsultant
 */
class RecommendationFrameAssembler implements DataAssemblerInterface
{
    /**
     * @var ConfigurationAssembler
     */
    protected $configurationAssembler;

    /**
     * @var RenderSettingsAssembler
     */
    protected $renderSettingsAssembler;

    /**
     * RecommendationFrameAssembler constructor.
     */
    public function __construct()
    {
        $this->configurationAssembler = new ConfigurationAssembler();
        $this->renderSettingsAssembler = new RenderSettingsAssembler();
    }

    /**
     * @param RecommendationFrame $frameDTO
     * @return array
     */
    public function readDTO(RecommendationFrame $frameDTO): array
    {
        $renderSettingsAssembler = $this->renderSettingsAssembler;
        return [
            'id' => $frameDTO->getId(),
            'name' => $frameDTO->getName(),
            'group_id' => $frameDTO->getGroupId(),
            'frame_type' => $frameDTO->getFrameType(),
            'number_of_products' => $frameDTO->getNumberOfProducts(),
            'minimal_stock' => $frameDTO->getMinimalStock(),
            'custom_html' => $frameDTO->getCustomHtml(),
            'configuration' => $frameDTO->getConfiguration() ? $this->configurationAssembler->readDTO($frameDTO->getConfiguration()) : null,
            'render_settings' => array_map(static function ($renderSettings) use ($renderSettingsAssembler) {
                return $renderSettingsAssembler->readDTO($renderSettings);
            }, $frameDTO->getRenderSettings()),
        ];
    }

    /**
     * @param array $frame
     * @return RecommendationFrame
     */
    public function writeDTO(array $frame): RecommendationFrame
    {
        $renderSettingsAssembler = $this->renderSettingsAssembler;

        $configuration = null;
        if (isset($frame['configuration']) && $frame['frame_type'] === "simple") {
            $configuration = $this->configurationAssembler->writeDTO($frame['configuration']);
        }

        $frameDTO = new RecommendationFrame();
        $frameDTO->setFrameType($frame['frame_type']);
        $frameDTO->setId($frame['id']);
        $frameDTO->setName($frame['name']);
        $frameDTO->setGroupId($frame['group_id']);
        $frameDTO->setNumberOfProducts($frame['number_of_products']);
        $frameDTO->setMinimalStock($frame['minimal_stock']);
        $frameDTO->setCustomHtml($frame['custom_html']);
        $frameDTO->setConfiguration($configuration);
        $frameDTO->setRenderSettings(array_map(static function ($filter) use ($renderSettingsAssembler) {
            return $renderSettingsAssembler->writeDTO($filter);
        }, $frame['render_settings']));
        return $frameDTO;
    }
}