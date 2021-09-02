<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\Assembler\RecommendationFrame\ConfigurationAssembler;
use Cyberkonsultant\DTO\RecommendationFrame;

/**
 * Class RecommendationFrameAssembler
 * @package Cyberkonsultant\Assembler
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
            'configuration' => $this->configurationAssembler->readDTO($frameDTO->getConfiguration()),
            'created_at' => $frameDTO->getCreatedAt()->format(DATE_ISO8601),
            'updated_at' => $frameDTO->getUpdatedAt()->format(DATE_ISO8601),
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
            $this->configurationAssembler->writeDTO($frame['configuration']),
            (new \DateTime())->setTimestamp(strtotime($frame['created_at'])),
            (new \DateTime())->setTimestamp(strtotime($frame['updated_at']))
        );
    }
}