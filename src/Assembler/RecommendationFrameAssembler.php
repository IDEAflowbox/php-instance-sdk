<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\Assembler\RecommendationFrame\ConfigurationAssembler;
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
     * RecommendationFrameAssembler constructor.
     */
    public function __construct()
    {
        $this->configurationAssembler = new ConfigurationAssembler();
    }

    /**
     * @param RecommendationFrame $frameDTO
     * @return array
     */
    public function readDTO(RecommendationFrame $frameDTO): array
    {
        return [
            'id' => $frameDTO->getId(),
            'name' => $frameDTO->getName(),
            'group_id' => $frameDTO->getGroupId(),
            'frame_type' => $frameDTO->getFrameType(),
            'number_of_products' => $frameDTO->getNumberOfProducts(),
            'minimal_stock' => $frameDTO->getMinimalStock(),
            'custom_html' => $frameDTO->getCustomHtml(),
            'xpath' => $frameDTO->getXpath(),
            'configuration' => $frameDTO->getConfiguration() ? $this->configurationAssembler->readDTO($frameDTO->getConfiguration()) : null,
        ];
    }

    /**
     * @param array $frame
     * @return RecommendationFrame
     */
    public function writeDTO(array $frame): RecommendationFrame
    {
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
        $frameDTO->setXpath($frame['xpath']);
        $frameDTO->setConfiguration($configuration);
        return $frameDTO;
    }
}