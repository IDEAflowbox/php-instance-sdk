<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame;

use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\EnabledElementsAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\FrameAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\MatrixAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\NavigationAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\TextAssembler;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Class ConfigurationAssembler
 *
 * @package Cyberkonsultant
 */
class ConfigurationAssembler
{
    /**
     * @var MatrixAssembler
     */
    protected $matrixAssembler;

    /**
     * @var EnabledElementsAssembler
     */
    protected $enabledElementsAssembler;

    /**
     * @var NavigationAssembler
     */
    protected $navigationAssembler;

    /**
     * @var TextAssembler
     */
    protected $textAssembler;

    /**
     * @var FrameAssembler
     */
    protected $frameAssembler;

    /**
     * ConfigurationAssembler constructor.
     */
    public function __construct()
    {
        $this->matrixAssembler = new MatrixAssembler();
        $this->enabledElementsAssembler = new EnabledElementsAssembler();
        $this->navigationAssembler = new NavigationAssembler();
        $this->textAssembler = new TextAssembler();
        $this->frameAssembler = new FrameAssembler();
    }

    /**
     * @param Configuration $configurationDTO
     * @return array
     */
    public function readDTO(Configuration $configurationDTO): array
    {
        return [
            'matrix' => $this->matrixAssembler->readDTO($configurationDTO->getMatrix()),
            'enabled_elements' => $this->enabledElementsAssembler->readDTO($configurationDTO->getEnabledElements()),
            'navigation' => $this->navigationAssembler->readDTO($configurationDTO->getNavigation()),
            'text' => $this->textAssembler->readDTO($configurationDTO->getText()),
            'frame' => $this->frameAssembler->readDTO($configurationDTO->getFrame()),
        ];
    }

    /**
     * @param array $configuration
     * @return Configuration
     */
    public function writeDTO(array $configuration): Configuration
    {
        return new Configuration(
            $this->matrixAssembler->writeDTO($configuration['matrix']),
            $this->enabledElementsAssembler->writeDTO($configuration['enabled_elements']),
            $this->navigationAssembler->writeDTO($configuration['navigation']),
            $this->textAssembler->writeDTO($configuration['text']),
            $this->frameAssembler->writeDTO($configuration['frame'])
        );
    }
}