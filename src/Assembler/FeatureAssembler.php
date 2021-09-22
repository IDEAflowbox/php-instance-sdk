<?php
declare(strict_types=1);

namespace Cyberkonsultant\Assembler;

use Cyberkonsultant\Assembler\Feature\ChoiceAssembler;
use Cyberkonsultant\DTO\Feature;

/**
 * Class FeatureAssembler
 *
 * @package Cyberkonsultant
 */
class FeatureAssembler implements DataAssemblerInterface
{
    /**
     * @var ChoiceAssembler
     */
    protected $choiceAssembler;

    public function __construct()
    {
        $this->choiceAssembler = new ChoiceAssembler();
    }

    /**
     * @param Feature $featureDTO
     * @return array
     */
    public function readDTO(Feature $featureDTO): array
    {
        $choiceAssembler = $this->choiceAssembler;
        return [
            'id' => $featureDTO->getId(),
            'name' => $featureDTO->getName(),
            'choices' => array_map(static function (Feature\Choice $choice) use ($choiceAssembler) {
                return $choiceAssembler->readDTO($choice);
            }, $featureDTO->getChoices()),
        ];
    }

    /**
     * @param array $feature
     * @return Feature
     */
    public function writeDTO(array $feature): Feature
    {
        $choiceAssembler = $this->choiceAssembler;
        return new Feature(
            $feature['id'],
            $feature['name'],
            array_map(static function ($choice) use ($choiceAssembler) {
                return $choiceAssembler->writeDTO($choice);
            }, $feature['choices'])
        );
    }
}