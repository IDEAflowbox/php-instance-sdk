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
        return new RecommendationFrame(
            $frame['id'],
            $frame['name'],
            $frame['group_id'],
            $frame['frame_type'],
            $frame['number_of_products'],
            $frame['custom_html'],
            $frame['xpath'],
            $frame['configuration'] ? $this->configurationAssembler->writeDTO($frame['configuration']) : null
        );
    }
}