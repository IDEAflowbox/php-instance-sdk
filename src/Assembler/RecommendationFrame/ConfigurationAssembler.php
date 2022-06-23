<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame;

use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\AnimationsAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\ArrowAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\ButtonAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\EnabledElementsAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\FrameAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\ImageAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\MatrixAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\ProductAssembler;
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
     * @var ImageAssembler
     */
    protected $imageAssembler;

    /**
     * @var FrameAssembler
     */
    protected $frameAssembler;

    /**
     * @var ProductAssembler
     */
    protected $productAssembler;

    /**
     * @var ArrowAssembler
     */
    protected $arrowAssembler;

    /**
     * @var ButtonAssembler
     */
    protected $buttonAssembler;

    /**
     * @var AnimationsAssembler
     */
    protected $animationsAssembler;

    /**
     * ConfigurationAssembler constructor.
     */
    public function __construct()
    {
        $this->matrixAssembler = new MatrixAssembler();
        $this->enabledElementsAssembler = new EnabledElementsAssembler();
        $this->imageAssembler = new ImageAssembler();
        $this->frameAssembler = new FrameAssembler();
        $this->productAssembler = new ProductAssembler();
        $this->arrowAssembler = new ArrowAssembler();
        $this->buttonAssembler = new ButtonAssembler();
        $this->animationsAssembler = new AnimationsAssembler();
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
            'image' => $this->imageAssembler->readDTO($configurationDTO->getImage()),
            'frame' => $this->frameAssembler->readDTO($configurationDTO->getFrame()),
            'product' => $this->productAssembler->readDTO($configurationDTO->getProduct()),
            'arrow' => $this->arrowAssembler->readDTO($configurationDTO->getArrow()),
            'button' => $this->buttonAssembler->readDTO($configurationDTO->getButton()),
            'animations' => $this->animationsAssembler->readDTO($configurationDTO->getAnimations()),
        ];
    }

    /**
     * @param array $configuration
     * @return Configuration
     */
    public function writeDTO(array $configuration): Configuration
    {
        $configurationDto = new Configuration();
        $configurationDto->setMatrix($this->matrixAssembler->writeDTO($configuration['matrix']));
        $configurationDto->setEnabledElements($this->enabledElementsAssembler->writeDTO($configuration['enabled_elements']));
        $configurationDto->setImage($this->imageAssembler->writeDTO($configuration['image']));
        $configurationDto->setFrame($this->frameAssembler->writeDTO($configuration['frame']));
        $configurationDto->setProduct($this->productAssembler->writeDTO($configuration['product']));
        $configurationDto->setArrow($this->arrowAssembler->writeDTO($configuration['arrow']));
        $configurationDto->setButton($this->buttonAssembler->writeDTO($configuration['button']));
        $configurationDto->setAnimations($this->animationsAssembler->writeDTO($configuration['animations']));
        return $configurationDto;
    }
}