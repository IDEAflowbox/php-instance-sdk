<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler\RecommendationFrame\Configuration;

use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame\ButtonAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame\DimensionsAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame\ImageStyleAssembler;
use Cyberkonsultant\Assembler\RecommendationFrame\Configuration\Frame\StyleAssembler;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Frame;

class FrameAssembler
{
    protected $dimensionsAssembler;
    protected $styleAssembler;
    protected $imageStyleAssembler;
    protected $buttonAssembler;

    public function __construct()
    {
        $this->dimensionsAssembler = new DimensionsAssembler();
        $this->styleAssembler = new StyleAssembler();
        $this->imageStyleAssembler = new ImageStyleAssembler();
        $this->buttonAssembler = new ButtonAssembler();
    }

    public function readDTO(Frame $frameDTO): array
    {
        return [
            'border_radius' => $frameDTO->getBorderRadius(),
            'dimensions' => $this->dimensionsAssembler->readDTO($frameDTO->getDimensions()),
            'style' => $this->styleAssembler->readDTO($frameDTO->getStyle()),
            'image_style' => $this->imageStyleAssembler->readDTO($frameDTO->getImageStyle()),
            'button' => $this->buttonAssembler->readDTO($frameDTO->getButton()),
        ];
    }

    public function writeDTO(array $frame): Frame
    {
        return new Frame(
            $frame['border_radius'],
            $this->dimensionsAssembler->writeDTO($frame['dimensions']),
            $this->styleAssembler->writeDTO($frame['style']),
            $this->imageStyleAssembler->writeDTO($frame['image_style']),
            $this->buttonAssembler->writeDTO($frame['button'])
        );
    }
}